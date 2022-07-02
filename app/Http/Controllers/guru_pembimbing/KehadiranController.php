<?php

namespace App\Http\Controllers\guru_pembimbing;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    public function index()
    {
        $data['magang-pkl'] = MagangPKL::select(
            'pengajuan_magang_pkl.id',
            'pengajuan_magang_pkl.id_perusahaan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
            'perusahaan.nama_perusahaan',
            'siswa.nis',
            'siswa.nama',
            'jurusan.nama_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where('perusahaan.id_pembimbing_lapang', Auth::guard('pembimbing-lapang')->user()->id)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->paginate(10);
        return view('guru-pembimbing.pages.validasi.kehadiran.list', compact('data'));
    }

    public function detail($id_pengajuan)
    {
        $data['magang-pkl'] = MagangPKL::select(
            'pengajuan_magang_pkl.id',
            'pengajuan_magang_pkl.id_perusahaan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
            'perusahaan.nama_perusahaan',
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'jurusan.nama_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where('pengajuan_magang_pkl.id', $id_pengajuan)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->first();

        $data['kehadiran'] = Absensi::select(
            'absensi.id',
            'absensi.id_siswa',
            'absensi.id_magang_pkl',
            'absensi.tanggal',
            'absensi.absensi',
            'absensi.status_guru_pembimbing',
            'absensi.status_pembimbing_lapang',
            'absensi.created_at',
        )
        ->where('id_magang_pkl', $id_pengajuan)
        ->get();
        return view('guru-pembimbing.pages.validasi.kehadiran.detail', compact('data'));
    }

    public function go_validasi($id_jurnal_harian, $tipe)
    {
        if (Absensi::where('id', $id_jurnal_harian)->exists()) {
            $query = Absensi::where('id', $id_jurnal_harian)->update([
                'status_guru_pembimbing' => $tipe
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Kehadiran ini telah berhasil di perbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kehadiran tidak ditemukan']);
    }
}
