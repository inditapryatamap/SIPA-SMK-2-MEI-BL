<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        $data['jurusan'] = Jurusan::paginate(10);
        return view('admin.pages.master-data.jurusan.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Jurusan berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jurusan' => ['required'],
            'nama_jurusan' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Jurusan::where('id', $request->id_jurusan)->exists()) {
            $query = Jurusan::where('id', $request->id_jurusan)->update([
                'nama_jurusan' => $request->nama_jurusan
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Jurusan berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Jurusan tidak ditemukan']);
    }

    public function go_delete($id_jurusan)
    {
        if (Jurusan::where('id', $id_jurusan)->exists()) {
            $query = Jurusan::where('id', $id_jurusan)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Jurusan berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Jurusan tidak ditemukan']);
    }
}
