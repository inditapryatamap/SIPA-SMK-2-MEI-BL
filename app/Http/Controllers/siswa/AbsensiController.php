<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $data['magang_pkl'] = MagangPKL::where([['id_siswa', Auth::guard('siswa')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->select(
            'pengajuan_magang_pkl.id', 
            'perusahaan.nama_perusahaan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi'
        )
        ->get();

        if ($request['magang-pkl'] != null) {
            $data['current_magang_pkl'] = MagangPKL::where([['pengajuan_magang_pkl.id', $request['magang-pkl']], ['pengajuan_magang_pkl.status', 'diverifikasi']])
            ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
            ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
            ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
            ->select(
                'pengajuan_magang_pkl.id', 
                'siswa.nama as nama_siswa',
                'siswa.nis',
                'perusahaan.nama_perusahaan',
                'jenis_kegiatan.nama_kegiatan', 
                'jenis_kegiatan.durasi'
            )
            ->first();
            $data['absensi'] = Absensi::where('id_magang_pkl', $request['magang-pkl'])->get();
        }
        return view('siswa.pages.riwayat.absensi', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => ['required', 'string'],
            'absensi' => ['required', 'string'],
            'id_magang_pkl' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (MagangPKL::where('id', $request->id_magang_pkl)->exists()) {
            if (!Absensi::where('id_magang_pkl', $request->id_magang_pkl)->whereDate('created_at', Carbon::today())->exists()) {
                $query = Absensi::create([
                    'id_siswa' => Auth::guard('siswa')->user()->id,
                    'id_magang_pkl' => $request->id_magang_pkl,
                    'tanggal' => $request->tanggal,
                    'absensi' => $request->absensi,
                    'status_guru_pembimbing' => 0,
                    'status_pembimbing_lapang' => 0,
                ]);
    
                if ($query) {
                    return redirect()->back()->with(['success' => 'Absensi telah berhasil di simpan, menunggu untuk di validasi']);
                }
                return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
            }
            return redirect()->back()->with(['errors' => 'Kehadiran untuk hari ini sudah dilakukan']);
        }
        return redirect()->back()->with(['errors' => 'Kegiatan tidak ditemukan']);
    }
}
