<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\MagangPKL;
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
        ->select('pengajuan_magang_pkl.id', 'pengajuan_magang_pkl.jenis_kegiatan', 'pengajuan_magang_pkl.nama_pembimbing', 'pengajuan_magang_pkl.status', 'perusahaan.nama_perusahaan')->get();
        return view('siswa.pages.pengajuan_magang_pkl', compact('data'));
    }

    public function go_create_pkl_magang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_perusahaan' => ['required', 'string', 'max:100'],
            'jenis_kegiatan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = MagangPKL::create([
            'id_siswa' => Auth::guard('siswa')->user()->id,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'id_perusahaan' => $request->id_perusahaan,
            'nama_pembimbing' => 'Belum Ditentukan',
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
        $data['perusahaan'] = Perusahaan::get();
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'profile_perusahaan' => $request->profile_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'no_telp' => $request->no_telp,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'created_by' => Auth::guard('siswa')->user()->id,
        ]);
        
        if ($query) {
            return redirect()->back()->with(['success' => 'Pengajuan '. $request->nama_perusahaan .' telah berhasil di ajukan']);
        } else {
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
    }
}
