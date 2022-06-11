<?php



namespace App\Http\Controllers\guru_pembimbing;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    public function index()
    {
        $data['dokumen'] = DokumenReview::select(
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'pengajuan_magang_pkl.jenis_kegiatan',
            'pengajuan_magang_pkl.id_perusahaan',
            'perusahaan.nama_perusahaan',
            'dokumen_dan_review.id',
            'dokumen_dan_review.judul_laporan'
        )
        ->join('siswa', 'siswa.id', 'dokumen_dan_review.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen_dan_review.id_magang_pkl')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->paginate(10);
        return view('guru-pembimbing.pages.dokumen.list', compact('data'));
    }

    public function detail($id_dokumen)
    {
        $data['dokumen'] = DokumenReview::select(
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'pengajuan_magang_pkl.jenis_kegiatan',
            'pengajuan_magang_pkl.id_perusahaan',
            'perusahaan.nama_perusahaan',
            'dokumen_dan_review.id',
            'dokumen_dan_review.judul_laporan',
            'dokumen_dan_review.file_laporan_ms_word',
            'dokumen_dan_review.file_laporan_pdf'
        )
        ->where('dokumen_dan_review.id', $id_dokumen)
        ->join('siswa', 'siswa.id', 'dokumen_dan_review.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen_dan_review.id_magang_pkl')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->first();
        return view('guru-pembimbing.pages.dokumen.detail', compact('data'));
    }
}
