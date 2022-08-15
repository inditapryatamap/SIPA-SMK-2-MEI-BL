<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Jurusan;
use App\Models\MagangPKL;
use App\Models\PembimbingLapang;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    public function pengajuan_magang_pkl()
    {
        $data['siswa'] = Auth::guard('siswa')->user();
        $data['siswa']['jurusan'] = Jurusan::where('id', Auth::guard('siswa')->user()->id_jurusan)->select('nama_jurusan')->first()->nama_jurusan;
        $data['perusahaan'] = Perusahaan::select('id', 'nama_perusahaan')->get();
        $data['magang_pkl'] = MagangPKL::where('id_siswa', Auth::guard('siswa')->user()->id)
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->select(
            'pengajuan_magang_pkl.id', 
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
            'pengajuan_magang_pkl.id_jenis_kegiatan', 
            'pengajuan_magang_pkl.id_guru_pembimbing',
            'pengajuan_magang_pkl.status', 
            'perusahaan.nama_perusahaan'
        )->get();

        for ($i=0; $i < count($data['magang_pkl']); $i++) { 
            if ($data['magang_pkl'][$i]->id_guru_pembimbing != null) {
                $data['magang_pkl'][$i]->nama_pembimbing = PembimbingLapang::select('nama')->where('id', $data['magang_pkl'][$i]->id_guru_pembimbing)->first()->nama;
            } else {
                $data['magang_pkl'][$i]->nama_pembimbing = null;
            }
        }

        $data['jenis-kegiatan'] = JenisKegiatan::get();
        return view('siswa.pages.pengajuan_magang_pkl', compact('data'));
    }

    public function go_create_pkl_magang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_perusahaan' => ['required', 'string', 'max:100'],
            'id_jenis_kegiatan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = MagangPKL::create([
            'id_siswa' => Auth::guard('siswa')->user()->id,
            'id_jenis_kegiatan' => $request->id_jenis_kegiatan,
            'id_perusahaan' => $request->id_perusahaan,
            'status' => 'diproses',
        ]);
        
        if ($query) {
            return redirect()->back()->with(['success' => 'Pengajuan '. $request->jenis_kegiatan .' telah berhasil dan sedang diproses']);
        } else {
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        
    }

    public function pengajuan_perusahaan()
    {
        $data['perusahaan'] = Perusahaan::orderBy('id', 'DESC')->get();
        return view('siswa.pages.pengajuan_perusahaan', compact('data'));
    }

    public function go_create_perusahaan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => ['required', 'string', 'max:100'],
            'profile_perusahaan' => ['required', 'string'],
            'alamat_perusahaan' => ['required', 'string', 'max:100', 'min:6'],
            'no_telp' => ['required', 'string', 'max:20', 'min:6'],
            'deskripsi_pekerjaan' => ['required', 'string'],
            'nama_pembimbing_lapang' => ['required', 'string'],
            'email_pembimbing_lapang' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id_pembimbing_lapang = PembimbingLapang::create([
            'email' => $request->email_pembimbing_lapang,
            'nama' => $request->nama_pembimbing_lapang,
            'no_telpon' => $request->no_telp,
            'password' => bcrypt('12345678')
        ])->id;

        $query = Perusahaan::create([
            'id_pembimbing_lapang' => $id_pembimbing_lapang,
            'nama_perusahaan' => $request->nama_perusahaan,
            'profile_perusahaan' => $request->profile_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'no_telp' => $request->no_telp,
            'status' => 'diproses',
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'created_by' => Auth::guard('siswa')->user()->id,
        ]);
        
        if ($query) {
            return redirect()->back()->with(['success' => 'Pengajuan '. $request->nama_perusahaan .' telah berhasil di ajukan']);
        } else {
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
    }

    public function go_delete_pkl_magang($id_pengajuan)
    {
        if (MagangPKL::where('id', $id_pengajuan)->exists()) {
            $query = MagangPKL::where('id', $id_pengajuan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Pengajuan berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Pengajuan tidak ditemukan']);
    }
}
