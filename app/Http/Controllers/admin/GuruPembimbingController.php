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

class GuruPembimbingController extends Controller
{
    public function index()
    {
        $data['guru_pembimbing'] = GuruPembimbing::paginate(10);
        return view('admin.pages.akun-guru-pembimbing.list', compact('data'));
    }

    public function update($id_guru_pembimbing)
    {
        $data['guru_pembimbing'] = GuruPembimbing::where('id', $id_guru_pembimbing)->first();
        return view('admin.pages.akun-guru-pembimbing.update', compact('data'));
    }
    
    public function create()
    {
        return view('admin.pages.akun-guru-pembimbing.create');
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'numeric', 'digits_between:4,20'],
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!GuruPembimbing::where('nis', $request->nis)->exists()) {
            $query = GuruPembimbing::create([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telpon' => $request->no_telpon,
                'password' => bcrypt($request->password),
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun guru pembimbing berhasil dibuat']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'NIS sudah terdaftar']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
            'id_guru_pembimbing' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (GuruPembimbing::where('id', $request->id_guru_pembimbing)->exists()) {
            $query = GuruPembimbing::where('id', $request->id_guru_pembimbing)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telpon' => $request->no_telpon,
            ]);

            if ($request->password !== null) {
                GuruPembimbing::where('id', $request->id_guru_pembimbing)->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun guru pembimbing berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Akun guru pembimbing tidak ditemukan']);
    }

    public function go_delete($id_guru_pembimbing)
    {
        if (GuruPembimbing::where('id', $id_guru_pembimbing)->exists()) {
            $query = GuruPembimbing::where('id', $id_guru_pembimbing)->delete();

            if ($query) {
                return redirect()->back()->with(['success' => 'Akun guru pembimbing berhasil dihapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Akun guru pembimbing tidak ditemukan']);
    }
}
