<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\GuruPembimbing;
use App\Models\MagangPKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ValidasiController extends Controller
{
    public function magangPKL()
    {
        $data['magang-pkl'] = MagangPKL::select(
            'pengajuan_magang_pkl.id', 
            'pengajuan_magang_pkl.jenis_kegiatan', 
            'pengajuan_magang_pkl.id_guru_pembimbing', 
            'pengajuan_magang_pkl.status', 
            'perusahaan.nama_perusahaan',
            'siswa.nama',
            'siswa.nis',
            'jurusan.nama_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->paginate(10);
        
        return view('admin.pages.validasi.magang-pkl.list', compact('data'));
    }

    public function detailMagangPKL($id_pengajuan)
    {
        $data['pengajuan'] = MagangPKL::select(
            'pengajuan_magang_pkl.id',
            'pengajuan_magang_pkl.jenis_kegiatan',
            'pengajuan_magang_pkl.id_guru_pembimbing',
            'pengajuan_magang_pkl.status',
            'pengajuan_magang_pkl.created_at',
            'perusahaan.nama_perusahaan',
            'perusahaan.profile_perusahaan',
            'perusahaan.alamat_perusahaan',
            'perusahaan.no_telp',
            'perusahaan.deskripsi_pekerjaan',
            'siswa.nama',
            'siswa.email',
            'siswa.jenis_kelamin',
            'siswa.ttl',
            'siswa.no_telpon as siswa_no_telpon',
            'siswa.nis',
            'jurusan.nama_jurusan',
            // 'guru_pembimbing.nama as pembimbing_nama',
            // 'guru_pembimbing.nis as pembimbing_nis'
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        // ->join('guru_pembimbing', 'guru_pembimbing.id', 'pengajuan_magang_pkl.id_guru_pembimbing')
        ->where('pengajuan_magang_pkl.id', $id_pengajuan)
        ->first();

        $data['pembimbing'] = GuruPembimbing::get();
        return view('admin.pages.validasi.magang-pkl.detail', compact('data'));
    }

    public function go_update_pembimbing(Request $request, $id_pengajuan)
    {
        $validator = Validator::make($request->all(), [
            'id_guru_pembimbing' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (MagangPKL::where('id', $id_pengajuan)->exists()) {
            $query = MagangPKL::where('id', $id_pengajuan)->update([
                'id_guru_pembimbing' => $request->id_guru_pembimbing
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Guru pembimbing berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Pengajuan tidak ditemukan']);
    }
}
