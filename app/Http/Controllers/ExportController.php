<?php

namespace App\Http\Controllers;

use App\Models\DokumenReview;
use App\Models\MagangPKL;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function siswa(Request $request)
    {
        $data['button_export'] = false;
        if (Auth::guard('admin')->user() != null) {
            $data['button_export'] = true;
        }
        
        $siswa = Siswa::select(
            "siswa.id", 
            "siswa.nama", 
            "siswa.nis",
            "jurusan.nama_jurusan",
            "siswa.jenis_kelamin",
            "siswa.ttl",
            "siswa.no_telpon",
        )
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->get();

        $data['siswa'] = [];
        // dd($siswa);
        for ($i=0; $i < count($siswa); $i++) { 
            

            if ($request['type'] != 'magang' && $request['type'] != 'pkl') {
                $data['siswa'][$i] = $siswa[$i];
                $data['siswa'][$i]['status'] = 'Belum melaksanakan PKL / Magang';
            }
            if (MagangPKL::where('id_siswa', $siswa[$i]->id)->exists()) {
                // dd('a');

                $magangpkl = MagangPKL::where('id_siswa', $siswa[$i]->id)->select('jenis_kegiatan.nama_kegiatan', 'pengajuan_magang_pkl.id')->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')->first();
                
                if ($magangpkl->nama_kegiatan == 'Praktik Kerja Lapangan - PKL' && $request['type'] == 'pkl') {
                    $data['siswa'][$i] = $siswa[$i];
                    $data['siswa'][$i]['status'] = 'Sedang melaksanakan ' . $magangpkl->nama_kegiatan;
                } else if ($magangpkl->nama_kegiatan == 'Magang' && $request['type'] == 'magang') {
                    $data['siswa'][$i] = $siswa[$i];
                    $data['siswa'][$i]['status'] = 'Sedang melaksanakan ' . $magangpkl->nama_kegiatan;
                }
                
                if (DokumenReview::where('id_magang_pkl', $magangpkl->id)->exists() && $request['type'] != 'magang' && $request['type'] != 'pkl') {
                    $data['siswa'][$i] = $siswa[$i];
                    $data['siswa'][$i]['status'] = 'Sudah melaksanakan ' . $magangpkl->nama_kegiatan;
                }
            }
        }

        $data['siswa'] = array_values($data['siswa']);
        return view('export.siswa', compact('data'));
    }

    public function perusahaan()
    {
        $data['button_export'] = false;
        if (Auth::guard('admin')->user() != null) {
            $data['button_export'] = true;
        }
        $data['perusahaan'] = Perusahaan::where('status', 'diverifikasi')
        ->select(
            'perusahaan.*',
            'pembimbing_lapang.nama as nama_pembimbing',
        )
        ->join('pembimbing_lapang', 'pembimbing_lapang.id', 'perusahaan.id_pembimbing_lapang')
        ->get();
        return view('export.perusahaan', compact('data'));
    }
}
