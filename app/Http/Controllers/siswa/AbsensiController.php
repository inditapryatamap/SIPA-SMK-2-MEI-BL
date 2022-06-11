<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $data['magang_pkl'] = MagangPKL::where([['id_siswa', Auth::guard('siswa')->user()->id], ['status', 'diverifikasi']])
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->select('pengajuan_magang_pkl.id', 'pengajuan_magang_pkl.jenis_kegiatan', 'perusahaan.nama_perusahaan')
        ->get();

        if ($request['magang-pkl'] != null) {
            $data['current_magang_pkl'] = MagangPKL::where([['id_siswa', Auth::guard('siswa')->user()->id], ['status', 'diverifikasi']])
            ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
            ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
            ->select('pengajuan_magang_pkl.id', 'siswa.nama as nama_siswa','pengajuan_magang_pkl.jenis_kegiatan', 'perusahaan.nama_perusahaan')
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
            $query = Absensi::create([
                'id_siswa' => Auth::guard('siswa')->user()->id,
                'id_magang_pkl' => $request->id_magang_pkl,
                'tanggal' => $request->tanggal,
                'absensi' => $request->absensi,
                'status' => 0,
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Absensi telah berhasil di simpan, menunggu untuk di validasi']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kegiatan tidak ditemukan']);
    }
}