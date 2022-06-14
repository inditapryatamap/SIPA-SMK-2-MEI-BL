<?php

namespace App\Http\Controllers\pembimbing_lapang;
use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use App\Models\MnJenisKegiatan;
use App\Models\NilaiJenisKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
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
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->where('perusahaan.id_pembimbing_lapang', Auth::guard('pembimbing-lapang')->user()->id)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->paginate(10);
        return view('pembimbing-lapang.pages.validasi.penilaian.list', compact('data'));
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
            'jurusan.id as id_jurusan',
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where('pengajuan_magang_pkl.id', $id_pengajuan)
        ->orderBy('perusahaan.nama_perusahaan', 'DESC')
        ->first();

        $data['jenis-kegiatan'] = NilaiJenisKegiatan::select(
            'mn_jenis_kegiatan.kompetensi',
            'mn_jenis_kegiatan.id as id_jenis_kegiatan',
            'nilai_jenis_kegiatan.pelaksanaan'
        )
        ->join('mn_jenis_kegiatan', 'mn_jenis_kegiatan.id', 'nilai_jenis_kegiatan.id_mn_kegiatan')
        ->where('id_jurusan', $data['magang-pkl']->id_jurusan)->get();

        // dd($data);
        return view('pembimbing-lapang.pages.validasi.penilaian.detail', compact('data'));
    }

    public function go_save_jenis_kegiatan(Request $request, $id_magang_pkl)
    {

        $validator = Validator::make($request->all(), [
            'id_mn_kegiatan' => ['required', 'array'],
            'pelaksanaan' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (NilaiJenisKegiatan::where('id_magang_pkl', $id_magang_pkl)->exists()) {
            NilaiJenisKegiatan::where('id_magang_pkl', $id_magang_pkl)->delete();
        }

        DB::beginTransaction();

        try {
            if (count($request->id_mn_kegiatan) === count($request->pelaksanaan)) {
                for ($i=0; $i < count($request->id_mn_kegiatan); $i++) { 
                    NilaiJenisKegiatan::create([
                        'id_magang_pkl' => $id_magang_pkl,
                        'id_mn_kegiatan' => $request->id_mn_kegiatan[$i],
                        'pelaksanaan' => $request->pelaksanaan[$i],
                    ]);
                }
            } else {
                return redirect()->back()->with(['errors' => 'Mohon lengkapi semua input yang tersedia']);
            }

            DB::commit();
            return redirect()->back()->with(['success' => 'Penilaian berhasil diperbarui']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['errors' => $e->getMessage()]);
            
        }

        
    }
}
