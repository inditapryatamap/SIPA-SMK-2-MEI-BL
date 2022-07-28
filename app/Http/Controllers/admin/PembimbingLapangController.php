<?php

namespace App\Http\Controllers\admin;

use App\Exports\PembimbingLapangExport;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\PembimbingLapang;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PembimbingLapangController extends Controller
{
    public function index()
    {
        $data['pembimbing_lapang'] = PembimbingLapang::paginate(10);
        return view('admin.pages.akun-pembimbing-lapang.list', compact('data'));
    }

    public function update($id_pembimbing_lapang)
    {
        $data['pembimbing_lapang'] = PembimbingLapang::where('id', $id_pembimbing_lapang)->first();
        return view('admin.pages.akun-pembimbing-lapang.update', compact('data'));
    }
    
    public function create()
    {
        return view('admin.pages.akun-pembimbing-lapang.create');
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!PembimbingLapang::where('email', $request->email)->exists()) {
            $query = PembimbingLapang::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telpon' => $request->no_telpon,
                'password' => bcrypt($request->password),
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun pembimbing lapang berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Email sudah terdaftar']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
            'id_pembimbing_lapang' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (PembimbingLapang::where('id', $request->id_pembimbing_lapang)->exists()) {
            $query = PembimbingLapang::where('id', $request->id_pembimbing_lapang)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telpon' => $request->no_telpon,
            ]);

            if ($request->password !== null) {
                PembimbingLapang::where('id', $request->id_pembimbing_lapang)->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun pembimbing lapang berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Akun pembimbing lapang tidak ditemukan']);
    }

    public function go_delete($id_pembimbing_lapang)
    {
        if (PembimbingLapang::where('id', $id_pembimbing_lapang)->exists()) {
            $query = PembimbingLapang::where('id', $id_pembimbing_lapang)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun pembimbing lapang berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Akun pembimbing lapang tidak ditemukan']);
    }

    public function export() 
    {
        return Excel::download(new PembimbingLapangExport, 'Pembimbing Lapang.xlsx');
    }
}
