<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerJawabanSelect;
use App\Models\MagangPKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    public function siswa()
    {
        $data['user'] = MagangPKL::where('id_guru_pembimbing', Auth::guard('guru-pembimbing')->user()->id)
        ->select(
            'siswa.id',
            'siswa.nama as nama_siswa',
            'siswa.nis',
            'perusahaan.nama_perusahaan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where([['pengajuan_magang_pkl.id_guru_pembimbing', Auth::guard('guru-pembimbing')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
        ->paginate(10);
        return view('guru-pembimbing.pages.kuesioner.siswa', compact('data'));
    }

    public function perusahaan()
    {
        $data['perusahaan'] = MagangPKL::where('id_guru_pembimbing', Auth::guard('guru-pembimbing')->user()->id)
        ->select(
            'perusahaan.id_pembimbing_lapang',
            'perusahaan.nama_perusahaan',
            'pembimbing_lapang.nama',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('pembimbing_lapang', 'pembimbing_lapang.id', 'perusahaan.id_pembimbing_lapang')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where([['pengajuan_magang_pkl.id_guru_pembimbing', Auth::guard('guru-pembimbing')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
        ->paginate(10);
        return view('guru-pembimbing.pages.kuesioner.perusahaan', compact('data'));
    }

    public function detail($tipe, $id_user)
    {
        $data['jawaban'] = null;
        if (KuesionerJawaban::where([['for', $tipe], ['id_user', $id_user]])->exists()) {
            $data['jawaban'] = KuesionerJawaban::select(
                'kuesioner_jawaban.id',
                'kuesioner_jawaban.id_kuesioner',
                'kuesioner_jawaban.id_user',
                'kuesioner_jawaban.jawaban',
                'kuesioner.for',
                'kuesioner.type',
                'kuesioner.pertanyaan',
            )
            ->where([['kuesioner_jawaban.for', $tipe], ['kuesioner_jawaban.id_user', $id_user]])
            ->join('kuesioner', 'kuesioner.id', 'kuesioner_jawaban.id_kuesioner')
            ->get();

            for ($i=0; $i < count($data['jawaban']); $i++) {
                $data['jawaban'][$i]->option = KuesionerJawabanSelect::where('id_kuesioner_jawaban', $data['jawaban'][$i]->id)->get();
            }
        }
        return view('guru-pembimbing.pages.kuesioner.detail', compact('data'));
    }
}
