<?php

namespace App\Http\Controllers\admin;

use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\DokumenReview;
use App\Models\Jurusan;
use App\Models\MagangPKL;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::select(
            'siswa.id',
            'siswa.id_jurusan',
            'siswa.nis',
            'siswa.nama',
            'jurusan.nama_jurusan',
        )
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->get();

        // dd($siswa);

        $data['siswa'] = [];
        for ($i=0; $i < count($siswa); $i++) { 
            $data['siswa'][$i] = $siswa[$i];

            $data['siswa'][$i]['status'] = 'Belum melaksanakan PKL / Magang';
            if (MagangPKL::where('id_siswa', $siswa[$i]->id)->exists()) {
                $magangpkl = MagangPKL::where('id_siswa', $siswa[$i]->id)->select('jenis_kegiatan.nama_kegiatan', 'pengajuan_magang_pkl.id')->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')->first();
                $data['siswa'][$i]['status'] = 'Sedang melaksanakan ' . $magangpkl->nama_kegiatan;

                if (DokumenReview::where('id_magang_pkl', $magangpkl->id)->exists()) {
                    $data['siswa'][$i]['status'] = 'Sudah melaksanakan ' . $magangpkl->nama_kegiatan;
                }
            }
        }

        return view('admin.pages.akun-siswa.list', compact('data'));
    }

    public function update($id_siswa)
    {
        $data['siswa'] = Siswa::select(
            'siswa.*',
            'jurusan.nama_jurusan',
            'jurusan.id as id_jurusan',
        )
        ->where('siswa.id', $id_siswa)
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->first();

        $data['jurusan'] = Jurusan::get();

        return view('admin.pages.akun-siswa.update', compact('data'));
    }
    
    public function create()
    {
        $data['jurusan'] = Jurusan::get();
        return view('admin.pages.akun-siswa.create', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'numeric', 'digits_between:6,20'],
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'ttl' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
            'id_jurusan' => ['required', 'integer'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Siswa::where('nis', $request->nis)->exists()) {
            $query = Siswa::create([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'ttl' => $request->ttl,
                'no_telpon' => $request->no_telpon,
                'id_jurusan' => $request->id_jurusan,
                'password' => bcrypt($request->password),
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun siswa berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'NIS sudah terdaftar']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'ttl' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
            'id_jurusan' => ['required', 'integer'],
            'id_siswa' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Siswa::where('id', $request->id_siswa)->exists()) {
            $query = Siswa::where('id', $request->id_siswa)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'ttl' => $request->ttl,
                'no_telpon' => $request->no_telpon,
                'id_jurusan' => $request->id_jurusan,
            ]);

            if ($request->password !== null) {
                Siswa::where('id', $request->id_siswa)->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun siswa berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Akun siswa tidak ditemukan']);
    }

    public function go_delete($id_siswa)
    {
        if (Siswa::where('id', $id_siswa)->exists()) {
            $query = Siswa::where('id', $id_siswa)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun siswa berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Akun siswa tidak ditemukan']);
    }

    public function export() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new SiswaImport,request()->file('file'));
               
        return back();
    }
}
