<?php



namespace App\Http\Controllers\guru_pembimbing;
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
            'dokumen.status_guru_pembimbing', 
        )
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where([['tipe', $tipe], ['pengajuan_magang_pkl.id_guru_pembimbing', Auth::guard('guru-pembimbing')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
        ->paginate(10);
        return view('guru-pembimbing.pages.dokumen.list', compact('data'));
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
            'dokumen.status_guru_pembimbing', 
        )
        ->where('dokumen.id', $id_dokumen)
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->first();
        return view('guru-pembimbing.pages.dokumen.detail', compact('data'));
    }

    public function go_validasi($id_dokumen, $tipe)
    {
        if (DokumenReview::where('id', $id_dokumen)->exists()) {
            $query = DokumenReview::where('id', $id_dokumen)->update([
                'status_guru_pembimbing' => $tipe
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Dokumen ini telah berhasil di perbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Dokumen tidak ditemukan']);
    }
}
