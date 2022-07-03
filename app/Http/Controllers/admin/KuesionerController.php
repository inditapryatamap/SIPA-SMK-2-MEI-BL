<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;
use App\Models\JenisSurat;
use App\Models\Kegiatan;
use App\Models\Kuesioner;
use App\Models\KuesionerSelect;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerJawabanSelect;
use App\Models\MagangPKL;

class KuesionerController extends Controller
{
    public function index()
    {
        $data['kuesioner'] = Kuesioner::paginate(10);

        for ($i=0; $i < count($data['kuesioner']); $i++) { 
            $data['kuesioner'][$i]['option'] = KuesionerSelect::where('id_kuesioner', $data['kuesioner'][$i]->id)->get();
        }
        return view('admin.pages.master-data.kuesioner.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => ['required'],
            'type' => ['required'],
            'for' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = Kuesioner::create([
            'pertanyaan' => $request->pertanyaan,
            'type' => $request->type,
            'for' => $request->for,
        ])->id;

        if (isset($request->option) && count($request->option) > 0) {
            for ($i=0; $i < count($request->option); $i++) { 
                KuesionerSelect::create([
                    'id_kuesioner' => $query,
                    'option' => $request->option[$i]
                ]);
            }
        }

        if ($query) {
            return redirect()->back()->with(['success' => 'Kuesioner berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kuesioner' => ['required'],
            'pertanyaan' => ['required'],
            'for' => ['required'],
            'type' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Kuesioner::where('id', $request->id_kuesioner)->exists()) {
            $query = Kuesioner::where('id', $request->id_kuesioner)->update([
                'pertanyaan' => $request->pertanyaan,
                'for' => $request->for,
                'type' => $request->type,
            ]);

            KuesionerSelect::where('id_kuesioner', $request->id_kuesioner)->delete();

            if ($request->type === 'select' && count($request->option) > 0) {
                // KuesionerSelect::where('id_kuesioner', $request->id_kuesioner)->delete();

                for ($i=0; $i < count($request->option); $i++) { 
                    KuesionerSelect::create([
                        'id_kuesioner' => $request->id_kuesioner,
                        'option' => $request->option[$i],
                    ]);
                }
            }
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Kuesioner berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kuesioner tidak ditemukan']);
    }

    public function go_delete($id_kuesioner)
    {
        if (Kuesioner::where('id', $id_kuesioner)->exists()) {
            $query = Kuesioner::where('id', $id_kuesioner)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Kuesioner berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kuesioner tidak ditemukan']);
    }

    public function siswa()
    {
        $data['user'] = MagangPKL::select(
            'siswa.id',
            'siswa.nama as nama_siswa',
            'siswa.nis',
            'perusahaan.nama_perusahaan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->join('siswa', 'siswa.id', 'pengajuan_magang_pkl.id_siswa')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->paginate(10);
        return view('admin.pages.kuesioner.siswa', compact('data'));
    }

    public function perusahaan()
    {
        $data['perusahaan'] = MagangPKL::select(
            'perusahaan.id_pembimbing_lapang',
            'perusahaan.nama_perusahaan',
            'pembimbing_lapang.nama',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('pembimbing_lapang', 'pembimbing_lapang.id', 'perusahaan.id_pembimbing_lapang')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->paginate(10);
        return view('admin.pages.kuesioner.perusahaan', compact('data'));
    }

    public function detail($tipe, $id_user)
    {
        $data['jawaban'] = null;
        if (KuesionerJawaban::where([['for', $tipe], ['id_user', $id_user]])->exists()) {
            $data['jawaban'] = KuesionerJawaban::select(
                'kuesioner_jawaban.id',
                'kuesioner_jawaban.id_kuesioner',
                'kuesioner_jawaban.id_user',
                'kuesioner_jawaban.jawaban',
                'kuesioner.for',
                'kuesioner.type',
                'kuesioner.pertanyaan',
            )
            ->where([['kuesioner_jawaban.for', $tipe], ['kuesioner_jawaban.id_user', $id_user]])
            ->join('kuesioner', 'kuesioner.id', 'kuesioner_jawaban.id_kuesioner')
            ->get();

            for ($i=0; $i < count($data['jawaban']); $i++) {
                $data['jawaban'][$i]->option = KuesionerJawabanSelect::where('id_kuesioner_jawaban', $data['jawaban'][$i]->id)->get();
            }
        }
        return view('admin.pages.kuesioner.detail', compact('data'));
    }
}
