<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use App\Models\MnJenisKegiatan;
use App\Models\MnKepribadian;
use App\Models\MnSuratKeterangan;
use App\Models\NilaiAspekTeknis;
use App\Models\NilaiJenisKegiatan;
use App\Models\NilaiKepribadian;
use App\Models\NilaiKeterampilan;
use App\Models\NilaiSuratKeterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        $data['magang_pkl'] = MagangPKL::where([['id_siswa', Auth::guard('siswa')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->select(
            'pengajuan_magang_pkl.id', 
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi',
            'perusahaan.nama_perusahaan'
        )
        ->get();
        
        // dd($request);
        if ($request['magang-pkl'] != null) {

            $data['magang_pkl'] = MagangPKL::where('pengajuan_magang_pkl.id', $request['magang-pkl'])
            ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
            ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
            ->select(
                'pengajuan_magang_pkl.id', 
                'jenis_kegiatan.nama_kegiatan', 
                'jenis_kegiatan.durasi',
                'perusahaan.nama_perusahaan'
            )
            ->first();

            $data['penilaian']['jenis-kegiatan'] = NilaiJenisKegiatan::select(
                'mn_jenis_kegiatan.kompetensi',
                'mn_jenis_kegiatan.id as id_jenis_kegiatan',
                'nilai_jenis_kegiatan.pelaksanaan'
            )
            ->join('mn_jenis_kegiatan', 'mn_jenis_kegiatan.id', 'nilai_jenis_kegiatan.id_mn_kegiatan')
            ->where('id_magang_pkl', $data['magang_pkl']->id)->get();

            if (count($data['penilaian']['jenis-kegiatan']) < 1) {
                $data['penilaian']['jenis-kegiatan'] = MnJenisKegiatan::select(
                    'kompetensi',
                    'id as id_jenis_kegiatan',
                )
                ->where('id_jurusan', Auth::guard('siswa')->user()->id_jurusan)->get();
            }

            // dd($data['jenis-kegiatan']);

            $data['penilaian']['keterampilan'] = NilaiKeterampilan::where('id_magang_pkl', $data['magang_pkl']->id)->get();

            $data['penilaian']['surat-keterangan'] = NilaiSuratKeterangan::select(
                'nilai_surat_keterangan.nilai',
                'mn_surat_keterangan.id',
                'mn_surat_keterangan.aspek_penilaian',
            )
            ->where('id_magang_pkl', $data['magang_pkl']->id)
            ->join('mn_surat_keterangan', 'mn_surat_keterangan.id', 'nilai_surat_keterangan.id_surat_keterangan')
            ->get();
            if (count($data['penilaian']['surat-keterangan']) < 1) {
                $data['penilaian']['surat-keterangan'] = MnSuratKeterangan::get();
            }

            $data['penilaian']['kepribadian'] = NilaiKepribadian::select(
                'nilai_kepribadian.nilai',
                'mn_kepribadian.id',
                'mn_kepribadian.aspek_penilaian',
            )
            ->where('id_magang_pkl', $data['magang_pkl']->id)
            ->join('mn_kepribadian', 'mn_kepribadian.id', 'nilai_kepribadian.id_kepribadian')
            ->get();
            if (count($data['penilaian']['kepribadian']) < 1) {
                $data['penilaian']['kepribadian'] = MnKepribadian::get();
            }

            $data['penilaian']['aspek-teknis'] = NilaiAspekTeknis::where('id_magang_pkl', $data['magang_pkl']->id)->get();
        }
        return view('siswa.pages.riwayat.penilaian', compact('data'));
    }
}
