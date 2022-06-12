<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;
use App\Models\JenisSurat;
use App\Models\Kegiatan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JenisSuratController extends Controller
{
    public function index()
    {
        $data['jenis-surat'] = JenisSurat::paginate(10);
        return view('admin.pages.master-data.jenis-surat.list', compact('data'));
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = JenisSurat::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Jenis surat berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jenis_surat' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (JenisSurat::where('id', $request->id_jenis_surat)->exists()) {
            $query = JenisSurat::where('id', $request->id_jenis_surat)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
    
            if ($query) {
                return redirect()->back()->with(['success' => 'Jenis surat berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Jenis surat tidak ditemukan']);
    }

    public function go_delete($id_jenis_surat)
    {
        if (JenisSurat::where('id', $id_jenis_surat)->exists()) {
            $query = JenisSurat::where('id', $id_jenis_surat)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Jenis surat berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Jenis surat tidak ditemukan']);
    }
}
