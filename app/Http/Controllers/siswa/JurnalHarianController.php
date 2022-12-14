<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurnalHarianController extends Controller
{
    public function index(Request $request)
    {
        
        $data['magang_pkl'] = MagangPKL::where([['id_siswa', Auth::guard('siswa')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->select(
            'pengajuan_magang_pkl.id', 
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi',
            'perusahaan.nama_perusahaan'
        )
        ->get();

        if ($request['magang-pkl'] != null) {
            $data['current_magang_pkl'] = MagangPKL::where([['id_siswa', Auth::guard('siswa')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
            ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
            ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
            ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
            ->select(
                'pengajuan_magang_pkl.id', 
                'siswa.nama as nama_siswa',
                'jenis_kegiatan.nama_kegiatan', 
                'jenis_kegiatan.durasi', 
                'perusahaan.nama_perusahaan'
            )
            ->first();
            $data['jurnal'] = JurnalHarian::where('id_magang_pkl', $request['magang-pkl'])->get();
        }
        return view('siswa.pages.riwayat.jurnal-harian', compact('data'));
    }

    public function go_create(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'tanggal' => ['required', 'string'],
            'kegiatan' => ['required', 'string'],
            'id_magang_pkl' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (MagangPKL::where('id', $request->id_magang_pkl)->exists()) {
            $query = JurnalHarian::create([
                'id_siswa' => Auth::guard('siswa')->user()->id,
                'id_magang_pkl' => $request->id_magang_pkl,
                'tanggal' => $request->tanggal,
                'kegiatan' => $request->kegiatan,
                'status_guru_pembimbing' => 0,
                'status_pembimbing_lapang' => 0,
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Jurnal harian telah berhasil di simpan, menunggu untuk di validasi']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kegiatan tidak ditemukan']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kegiatan' => ['required', 'string'],
            'id_kegiatan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (JurnalHarian::where('id', $request->id_kegiatan)->exists()) {
            $query = JurnalHarian::where('id', $request->id_kegiatan)->update([
                'kegiatan' => $request->kegiatan,
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Jurnal harian telah berhasil di perbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Jurnal harian tidak ditemukan']);
    }
}
