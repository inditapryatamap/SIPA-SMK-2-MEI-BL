<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\Jurusan;
use App\Models\MnJenisKegiatan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenilaianJenisKegiatanController extends Controller
{
    public function index()
    {
        $data['jenis-kegiatan'] = MnJenisKegiatan::select(
            'mn_jenis_kegiatan.id',
            'mn_jenis_kegiatan.id_jurusan',
            'mn_jenis_kegiatan.kompetensi',
            'mn_jenis_kegiatan.created_at',
            'jurusan.nama_jurusan',
        )
        ->join('jurusan', 'jurusan.id', 'mn_jenis_kegiatan.id_jurusan')
        ->paginate(10);

        $data['jurusan'] = Jurusan::get();

        return view('admin.pages.master-data.penilaian.jenis-kegiatan.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jurusan' => ['required'],
            'kompetensi' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = MnJenisKegiatan::create([
            'id_jurusan' => $request->id_jurusan,
            'kompetensi' => $request->kompetensi,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Kompetensi berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jenis_kegiatan' => ['required'],
            'id_jurusan' => ['required'],
            'kompetensi' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (MnJenisKegiatan::where('id', $request->id_jenis_kegiatan)->exists()) {
            $query = MnJenisKegiatan::where('id', $request->id_jenis_kegiatan)->update([
                'id_jurusan' => $request->id_jurusan,
                'kompetensi' => $request->kompetensi,
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Kompetensi berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kompetensi tidak ditemukan']);
    }

    public function go_delete($id_jenis_kegiatan)
    {
        if (MnJenisKegiatan::where('id', $id_jenis_kegiatan)->exists()) {
            $query = MnJenisKegiatan::where('id', $id_jenis_kegiatan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Kompetensi berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kompetensi tidak ditemukan']);
    }
}
