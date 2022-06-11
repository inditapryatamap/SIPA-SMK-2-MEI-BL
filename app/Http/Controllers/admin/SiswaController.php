<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $data['siswa'] = Siswa::select(
            'siswa.id',
            'siswa.id_jurusan',
            'siswa.nis',
            'siswa.nama',
            'jurusan.nama_jurusan',
        )
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->paginate(10);
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
}
