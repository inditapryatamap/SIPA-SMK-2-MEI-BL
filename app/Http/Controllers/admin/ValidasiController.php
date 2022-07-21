<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\GuruPembimbing;
use App\Models\MagangPKL;
use App\Models\PembimbingLapang;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ValidasiController extends Controller
{
    public function magangPKL()
    {
        $data['magang-pkl'] = MagangPKL::select(
            'pengajuan_magang_pkl.id', 
            'pengajuan_magang_pkl.id_jenis_kegiatan', 
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
            'pengajuan_magang_pkl.id_guru_pembimbing', 
            'pengajuan_magang_pkl.status', 
            'perusahaan.nama_perusahaan',
            'siswa.nama',
            'siswa.nis',
            'jurusan.nama_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->paginate(10);

        for ($i=0; $i < count($data['magang-pkl']); $i++) { 
            if ($data['magang-pkl'][$i]->id_guru_pembimbing != null) {
                $data['magang-pkl'][$i]->pembimbing_nama = PembimbingLapang::select('nama')->where('id', $data['magang-pkl'][$i]->id_guru_pembimbing)->first()->nama;
            } else {
                $data['magang-pkl'][$i]->pembimbing_nama = 'Belum Ditentukan';
            }
        }

        // dd($data['magang-pkl']);
        
        return view('admin.pages.validasi.magang-pkl.list', compact('data'));
    }

    public function perusahaan()
    {
        $data['perusahaan'] = Perusahaan::select(
            'perusahaan.id',
            'perusahaan.nama_perusahaan',
            'perusahaan.alamat_perusahaan',
            'perusahaan.no_telp',
            'perusahaan.status',
            'pembimbing_lapang.nama',
        )
        ->join('pembimbing_lapang', 'pembimbing_lapang.id', 'perusahaan.id_pembimbing_lapang')->paginate(10);

        $data['pemimbing_lapang'] = PembimbingLapang::select('id', 'nama')->get();
        return view('admin.pages.validasi.perusahaan.list', compact('data'));
    }

    public function go_create_perusahaan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pembimbing_lapang' => ['required', 'string'],
            'nama_perusahaan' => ['required', 'string'],
            'profile_perusahaan' => ['required', 'string'],
            'alamat_perusahaan' => ['required', 'string'],
            'no_telp' => ['required', 'string'],
            'deskripsi_pekerjaan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = Perusahaan::create([
            'id_pembimbing_lapang' => $request->id_pembimbing_lapang,
            'nama_perusahaan' => $request->nama_perusahaan,
            'profile_perusahaan' => $request->profile_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'no_telp' => $request->no_telp,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'status' => 'diverifikasi',
            'created_by' => Auth::guard('admin')->user()->id
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Perusahaan berhasil diperbarui']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function detailPerusahaan($id_perusahaan)
    {
        $data['perusahaan'] = Perusahaan::select(
            'perusahaan.id',
            'perusahaan.nama_perusahaan',
            'perusahaan.alamat_perusahaan',
            'perusahaan.profile_perusahaan',
            'perusahaan.deskripsi_pekerjaan',
            'perusahaan.status',
            'perusahaan.no_telp',
            'pembimbing_lapang.nama as nama_pembimbing',
            'siswa.nama as nama_siswa',
        )
        ->where('perusahaan.id', $id_perusahaan)
        ->join('pembimbing_lapang', 'pembimbing_lapang.id', 'perusahaan.id_pembimbing_lapang')
        ->join('siswa', 'siswa.id', 'perusahaan.created_by')
        ->first();

        return view('admin.pages.validasi.perusahaan.detail', compact('data'));
    }

    public function detailMagangPKL($id_pengajuan)
    {
        $data['pengajuan'] = MagangPKL::select(
            'pengajuan_magang_pkl.id',
            'pengajuan_magang_pkl.id_jenis_kegiatan', 
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
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
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        // ->join('guru_pembimbing', 'guru_pembimbing.id', 'pengajuan_magang_pkl.id_guru_pembimbing')
        ->where('pengajuan_magang_pkl.id', $id_pengajuan)
        ->first();
        
        if ($data['pengajuan']->id_guru_pembimbing != null) {
            $data['pengajuan']->pembimbing_nama = PembimbingLapang::select('nama')->where('id', $data['pengajuan']->id_guru_pembimbing)->first()->nama;
        } else {
            $data['pengajuan']->pembimbing_nama = '';
        }

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

    public function go_update_status($id_pengajuan, $tipe)
    {
        if (MagangPKL::where('id', $id_pengajuan)->exists()) {
            $query = MagangPKL::where('id', $id_pengajuan)->update([
                'status' => $tipe
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Status pengajuan berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Pengajuan tidak ditemukan']);
    }

    public function go_update_status_perusahaan($id_perusahaan, $tipe)
    {
        if (Perusahaan::where('id', $id_perusahaan)->exists()) {
            $query = Perusahaan::where('id', $id_perusahaan)->update([
                'status' => $tipe
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Status perusahaan berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Perusahaan tidak ditemukan']);
    }
}
