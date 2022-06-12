<?php

namespace App\Http\Controllers\pembimbing_lapang;
use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['magang-pkl'] = MagangPKL::select(
            'pengajuan_magang_pkl.id',
            'pengajuan_magang_pkl.id_perusahaan',
            'pengajuan_magang_pkl.jenis_kegiatan',
            'perusahaan.nama_perusahaan',
            'siswa.nis',
            'siswa.nama',
            'jurusan.nama_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->where('perusahaan.id_pembimbing_lapang', Auth::guard('pembimbing-lapang')->user()->id)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->paginate(10);
        return view('pembimbing-lapang.pages.penilaian.list', compact('data'));
    }
}
