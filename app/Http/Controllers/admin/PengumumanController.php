<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{

    public function detail($id_pengumuman)
    {
        if (Pengumuman::where('id', $id_pengumuman)->exists()) {
            $data['pengumuman'] = Pengumuman::where('id', $id_pengumuman)->first();

            return view('admin.pages.pengumuman.detail', compact('data'));
        }
        return redirect()->back()->with(['errors' => 'Pengumuman tidak ditemukan']);
    }

    public function go_create_pengumuman(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pengumuman' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = Pengumuman::create([
            'pengumuman' => $request->pengumuman,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Pengumuman berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_delete_pengumuman($id_pengumuman)
    {
        if (Pengumuman::where('id', $id_pengumuman)->exists()) {
            $query = Pengumuman::where('id', $id_pengumuman)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Pengumuman berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Pengumuman tidak ditemukan']);
    }
}
