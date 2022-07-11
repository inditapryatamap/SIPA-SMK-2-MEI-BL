<?php

namespace App\Http\Controllers\pembimbing_lapang;
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

            return view('pembimbing-lapang.pages.pengumuman.detail', compact('data'));
        }
        return redirect()->back()->with(['errors' => 'Pengumuman tidak ditemukan']);
    }
}
