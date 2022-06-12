<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Jurusan;
use App\Models\MagangPKL;
use App\Models\Perusahaan;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    public function index()
    {
        $data['surat'] = Surat::where('id_siswa', Auth::guard('siswa')->user()->id)
        ->select('surat.id', 'surat.status', 'surat.file', 'surat.keterangan', 'siswa.nama as nama_siswa', 'jenis_surat.name as nama_surat')
        ->join('siswa', 'surat.id_siswa', 'siswa.id')
        ->join('jenis_surat', 'surat.id_jenis_surat', 'jenis_surat.id')
        ->paginate(1);
        return view('siswa.pages.surat.list', compact('data'));
    }

    public function create()
    {
        $data['siswa'] = Auth::guard('siswa')->user();
        $data['siswa']['jurusan'] = Jurusan::where('id', Auth::guard('siswa')->user()->id_jurusan)->select('nama_jurusan')->first()->nama_jurusan;
        $data['jenis_surat'] = JenisSurat::select('id', 'name')->get();
        // $data['magang_pkl'] = MagangPKL::where('id_siswa', Auth::guard('siswa')->user()->id)
        // ->select('pengajuan_magang_pkl.id', 'pengajuan_magang_pkl.jenis_kegiatan', 'pengajuan_magang_pkl.nama_pembimbing', 'pengajuan_magang_pkl.status', 'perusahaan.nama_perusahaan')->get();
        return view('siswa.pages.surat.create', compact('data'));
    }

    public function go_create_surat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jenis_surat' => ['required', 'integer'],
            'keterangan' => ['string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (JenisSurat::where('id', $request->id_jenis_surat)->exists()) {
            $query = Surat::create([
                'id_siswa' => Auth::guard('siswa')->user()->id,
                'id_jenis_surat' => $request->id_jenis_surat,
                'id_perusahaan' => $request->id_perusahaan,
                'status' => 'diproses',
                'keterangan' => $request->keterangan,
            ]);
    
            if ($query) {
                return redirect()->route('surat.list')->with(['success' => 'Surat telah berhasil diajukan dan sedang diproses']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Surat atau perusahaan tidak ditemukan']);
    }
}
