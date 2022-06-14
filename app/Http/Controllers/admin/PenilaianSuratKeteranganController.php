<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\Jurusan;
use App\Models\MnSuratKeterangan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenilaianSuratKeteranganController extends Controller
{
    public function index()
    {
        $data['surat-keterangan'] = MnSuratKeterangan::select(
            'mn_surat_keterangan.id',
            'mn_surat_keterangan.aspek_penilaian',
            'mn_surat_keterangan.created_at',
        )
        ->paginate(10);

        return view('admin.pages.master-data.penilaian.surat-keterangan.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aspek_penilaian' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = MnSuratKeterangan::create([
            'aspek_penilaian' => $request->aspek_penilaian,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Aspek Penilaian Surat Keterangan berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kepribadian' => ['required'],
            'aspek_penilaian' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (MnSuratKeterangan::where('id', $request->id_kepribadian)->exists()) {
            $query = MnSuratKeterangan::where('id', $request->id_kepribadian)->update([
                'aspek_penilaian' => $request->aspek_penilaian,
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Aspek Penilaian Surat Keterangan berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Aspek Penilaian Surat Keterangan tidak ditemukan']);
    }

    public function go_delete($id_jenis_kegiatan)
    {
        if (MnSuratKeterangan::where('id', $id_jenis_kegiatan)->exists()) {
            $query = MnSuratKeterangan::where('id', $id_jenis_kegiatan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Aspek Penilaian Surat Keterangan berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Aspek Penilaian Surat Keterangan tidak ditemukan']);
    }
}
