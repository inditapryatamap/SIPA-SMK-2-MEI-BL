<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\Jurusan;
use App\Models\MnKepribadian;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenilaianKepribadianController extends Controller
{
    public function index()
    {
        $data['kepribadian'] = MnKepribadian::select(
            'mn_kepribadian.id',
            'mn_kepribadian.aspek_penilaian',
            'mn_kepribadian.created_at',
        )
        ->paginate(10);

        return view('admin.pages.master-data.penilaian.kepribadian.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aspek_penilaian' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = MnKepribadian::create([
            'aspek_penilaian' => $request->aspek_penilaian,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Aspek Penilaian Kepribadian berhasil dibuat']);
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

        if (MnKepribadian::where('id', $request->id_kepribadian)->exists()) {
            $query = MnKepribadian::where('id', $request->id_kepribadian)->update([
                'aspek_penilaian' => $request->aspek_penilaian,
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Aspek Penilaian Kepribadian berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Aspek Penilaian Kepribadian tidak ditemukan']);
    }

    public function go_delete($id_jenis_kegiatan)
    {
        if (MnKepribadian::where('id', $id_jenis_kegiatan)->exists()) {
            $query = MnKepribadian::where('id', $id_jenis_kegiatan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Aspek Penilaian Kepribadian berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Aspek Penilaian Kepribadian tidak ditemukan']);
    }
}
