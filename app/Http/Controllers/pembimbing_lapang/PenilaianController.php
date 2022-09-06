<?php

namespace App\Http\Controllers\pembimbing_lapang;
use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\MagangPKL;
use App\Models\MnJenisKegiatan;
use App\Models\MnKepribadian;
use App\Models\MnSuratKeterangan;
use App\Models\NilaiAspekTeknis;
use App\Models\NilaiJenisKegiatan;
use App\Models\NilaiKepribadian;
use App\Models\NilaiKeterampilan;
use App\Models\NilaiSuratKeterangan;
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
        ->where([['perusahaan.id_pembimbing_lapang', Auth::guard('pembimbing-lapang')->user()->id], ['pengajuan_magang_pkl.status', 'diverifikasi']])
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
        ->where('id_magang_pkl', $id_pengajuan)->get();
        // ->where('id_jurusan', $data['magang-pkl']->id_jurusan)->get();
        if (count($data['jenis-kegiatan']) < 1) {
            $data['jenis-kegiatan'] = MnJenisKegiatan::select(
                'kompetensi',
                'id as id_jenis_kegiatan',
            )
            ->where('id_jurusan', $data['magang-pkl']->id_jurusan)->get();
        }

        // dd($data['jenis-kegiatan']);

        $data['keterampilan'] = NilaiKeterampilan::where('id_magang_pkl', $id_pengajuan)->get();

        $data['surat-keterangan'] = NilaiSuratKeterangan::select(
            'nilai_surat_keterangan.nilai',
            'mn_surat_keterangan.id',
            'mn_surat_keterangan.aspek_penilaian',
        )
        ->where('id_magang_pkl', $id_pengajuan)
        ->join('mn_surat_keterangan', 'mn_surat_keterangan.id', 'nilai_surat_keterangan.id_surat_keterangan')
        ->get();
        if (count($data['surat-keterangan']) < 1) {
            $data['surat-keterangan'] = MnSuratKeterangan::get();
        }

        $data['kepribadian'] = NilaiKepribadian::select(
            'nilai_kepribadian.nilai',
            'mn_kepribadian.id',
            'mn_kepribadian.aspek_penilaian',
        )
        ->where('id_magang_pkl', $id_pengajuan)
        ->join('mn_kepribadian', 'mn_kepribadian.id', 'nilai_kepribadian.id_kepribadian')
        ->get();
        if (count($data['kepribadian']) < 1) {
            $data['kepribadian'] = MnKepribadian::get();
        }

        $data['aspek-teknis'] = NilaiAspekTeknis::where('id_magang_pkl', $id_pengajuan)->get();
        
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

    public function go_save_keterampilan(Request $request, $id_pengajuan)
    {
        $validator = Validator::make($request->all(), [
            'keterampilan' => ['required', 'string'],
            'indikator_keberhasilan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = NilaiKeterampilan::create([
            'id_magang_pkl' => $id_pengajuan,
            'keterampilan' => $request->keterampilan,
            'indikator_keberhasilan' => $request->indikator_keberhasilan,
            'status' => 0,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Nilai Keterampilan berhasil ditambah']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update_keterampilan(Request $request, $id_keterampilan)
    {
        $validator = Validator::make($request->all(), [
            'keterampilan' => ['required', 'string'],
            'indikator_keberhasilan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = NilaiKeterampilan::where('id', $id_keterampilan)->update([
            'keterampilan' => $request->keterampilan,
            'indikator_keberhasilan' => $request->indikator_keberhasilan,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Nilai Keterampilan berhasil diperbarui']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_delete_keterampilan($id_keterampilan)
    {
        if (NilaiKeterampilan::where('id', $id_keterampilan)->exists()) {
            $query = NilaiKeterampilan::where('id', $id_keterampilan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Nilai Keterampilan berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Nilai Keterampilan tidak ditemukan']);
    }
    
    public function go_save_surat_keterangan(Request $request, $id_magang_pkl)
    {
        $validator = Validator::make($request->all(), [
            'id_mn_surat_keterangan' => ['required', 'array'],
            'input_aspek_penilaian' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (NilaiSuratKeterangan::where('id_magang_pkl', $id_magang_pkl)->exists()) {
            NilaiSuratKeterangan::where('id_magang_pkl', $id_magang_pkl)->delete();
        }

        DB::beginTransaction();

        try {
            if (count($request->id_mn_surat_keterangan) === count($request->input_aspek_penilaian)) {
                for ($i=0; $i < count($request->id_mn_surat_keterangan); $i++) { 
                    NilaiSuratKeterangan::create([
                        'id_magang_pkl' => $id_magang_pkl,
                        'id_surat_keterangan' => $request->id_mn_surat_keterangan[$i],
                        'nilai' => $request->input_aspek_penilaian[$i],
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

    public function go_save_kepribadian(Request $request, $id_magang_pkl)
    {
        $validator = Validator::make($request->all(), [
            'id_mn_surat_kepribadian' => ['required', 'array'],
            'input_aspek_penilaian' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (NilaiKepribadian::where('id_magang_pkl', $id_magang_pkl)->exists()) {
            NilaiKepribadian::where('id_magang_pkl', $id_magang_pkl)->delete();
        }

        DB::beginTransaction();

        try {
            if (count($request->id_mn_surat_kepribadian) === count($request->input_aspek_penilaian)) {
                for ($i=0; $i < count($request->id_mn_surat_kepribadian); $i++) { 
                    NilaiKepribadian::create([
                        'id_magang_pkl' => $id_magang_pkl,
                        'id_kepribadian' => $request->id_mn_surat_kepribadian[$i],
                        'nilai' => $request->input_aspek_penilaian[$i],
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

    public function go_save_aspek_teknis(Request $request, $id_magang_pkl)
    {
        $validator = Validator::make($request->all(), [
            'jenis_keterampilan' => ['required', 'string'],
            'nilai' => ['required', 'integer'],
            'keterangan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = NilaiAspekTeknis::create([
            'id_magang_pkl' => $id_magang_pkl,
            'jenis_keterampilan' => $request->jenis_keterampilan,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Penilaian berhasil diperbarui']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update_aspek_teknis(Request $request, $id_aspek_teknis)
    {
        $validator = Validator::make($request->all(), [
            'jenis_keterampilan' => ['required', 'string'],
            'nilai' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (NilaiAspekTeknis::where('id', $id_aspek_teknis)) {
            $query = NilaiAspekTeknis::where('id', $id_aspek_teknis)->update([
                'jenis_keterampilan' => $request->jenis_keterampilan,
                'nilai' => $request->nilai,
                'keterangan' => $request->keterangan,
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Penilaian berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Aspek teknis tidak ditemukan']);
    }

    public function go_delete_aspek_teknis($id_aspek_teknis)
    {
        if (NilaiAspekTeknis::where('id', $id_aspek_teknis)->exists()) {
            $query = NilaiAspekTeknis::where('id', $id_aspek_teknis)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Nilai Aspek Teknis berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Nilai Aspek Teknis tidak ditemukan']);
    }
}
