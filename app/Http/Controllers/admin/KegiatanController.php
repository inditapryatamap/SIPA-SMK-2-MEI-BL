<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;
use App\Models\JenisKegiatan;
use App\Models\Kegiatan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function index()
    {
        $data['kegiatan'] = JenisKegiatan::paginate(10);
        return view('admin.pages.master-data.kegiatan.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => ['required'],
            'durasi' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = JenisKegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'durasi' => $request->durasi,
            'keterangan' => $request->keterangan,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Kegiatan berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jurusan' => ['required'],
            'nama_kegiatan' => ['required'],
            'durasi' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (JenisKegiatan::where('id', $request->id_jurusan)->exists()) {
            $query = JenisKegiatan::where('id', $request->id_jurusan)->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'durasi' => $request->durasi,
                'keterangan' => $request->keterangan,
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Kegiatan berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kegiatan tidak ditemukan']);
    }

    public function go_delete($id_jurusan)
    {
        if (JenisKegiatan::where('id', $id_jurusan)->exists()) {
            $query = JenisKegiatan::where('id', $id_jurusan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Kegiatan berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kegiatan tidak ditemukan']);
    }
}
