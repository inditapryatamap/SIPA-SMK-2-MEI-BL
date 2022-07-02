<?php



namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    public function index($tipe)
    {
        $data['dokumen'] = DokumenReview::select(
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'pengajuan_magang_pkl.id_jenis_kegiatan',
            'pengajuan_magang_pkl.id_perusahaan',
            'perusahaan.nama_perusahaan',
            'dokumen.id',
            'dokumen.judul_laporan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where('tipe', $tipe)
        ->paginate(10);
        return view('admin.pages.dokumen.list', compact('data'));
    }

    public function detail($id_dokumen)
    {
        $data['dokumen'] = DokumenReview::select(
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'pengajuan_magang_pkl.id_jenis_kegiatan',
            'pengajuan_magang_pkl.id_perusahaan',
            'perusahaan.nama_perusahaan',
            'dokumen.id',
            'dokumen.judul_laporan',
            'dokumen.file_laporan_ms_word',
            'dokumen.file_laporan_pdf',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->where('dokumen.id', $id_dokumen)
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->first();
        return view('admin.pages.dokumen.detail', compact('data'));
    }
}
