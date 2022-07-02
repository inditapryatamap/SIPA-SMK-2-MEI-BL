<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function detail($id_pengumuman)
    {
        if (Pengumuman::where('id', $id_pengumuman)->exists()) {
            $data['pengumuman'] = Pengumuman::where('id', $id_pengumuman)->first();

            return view('siswa.pages.pengumuman.detail', compact('data'));
        }
        return redirect()->back()->with(['errors' => 'Pengumuman tidak ditemukan']);
    }
}
