<?php

namespace App\Http\Controllers\guru_pembimbing;
use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalHarianController extends Controller
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
        ->where('pengajuan_magang_pkl.id_guru_pembimbing', Auth::guard('guru-pembimbing')->user()->id)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->paginate(10);
        return view('guru-pembimbing.pages.jurnal-harian.list', compact('data'));
    }

    public function detail($id_pengajuan)
    {
        $data['magang-pkl'] = MagangPKL::select(
            'pengajuan_magang_pkl.id',
            'pengajuan_magang_pkl.id_perusahaan',
            'pengajuan_magang_pkl.jenis_kegiatan',
            'perusahaan.nama_perusahaan',
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'jurusan.nama_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->where('pengajuan_magang_pkl.id', $id_pengajuan)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->first();

        $data['jurnal-harian'] = JurnalHarian::select(
            'jurnal_harian.id',
            'jurnal_harian.tanggal',
            'jurnal_harian.kegiatan',
            'jurnal_harian.status_guru_pembimbing',
            'jurnal_harian.status_pembimbing_lapang',
            'jurnal_harian.created_at',
        )
        ->where('id_magang_pkl', $id_pengajuan)
        ->get();
        return view('guru-pembimbing.pages.jurnal-harian.detail', compact('data'));
    }

    public function go_validasi($id_jurnal_harian, $tipe)
    {
        
        if (JurnalHarian::where('id', $id_jurnal_harian)->exists()) {
            $query = JurnalHarian::where('id', $id_jurnal_harian)->update([
                'status_guru_pembimbing' => $tipe
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Jurnal harian ini telah berhasil di perbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Jurnal harian tidak ditemukan']);
    }
}
