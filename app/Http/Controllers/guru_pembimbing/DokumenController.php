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
            'dokumen.id',
            'dokumen.judul_laporan'
        )
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
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
            'dokumen.id',
            'dokumen.judul_laporan',
            'dokumen.file_laporan_ms_word',
            'dokumen.file_laporan_pdf'
        )
        ->where('dokumen.id', $id_dokumen)
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->first();
        return view('guru-pembimbing.pages.dokumen.detail', compact('data'));
    }
}
