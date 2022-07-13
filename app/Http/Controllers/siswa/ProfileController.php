<?php
namespace App\Http\Controllers\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = Siswa::where('id', Auth::guard('siswa')->user()->id)->first();
        $data['jurusan'] = Jurusan::get();
        return view('siswa.pages.profile', compact('data'));
    }

    public function go_update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jurusan' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'nis' => ['required', 'string'],
            'email' => ['required', 'string'],
            'ttl' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $password = '';
        if ($request->password == null) {
            $password = Auth::guard('siswa')->user()->password;
        } else {
            $password = $request->password;
        }

        if (Siswa::where('id', Auth::guard('siswa')->user()->id)->exists()) {
            $query = Siswa::where('id', Auth::guard('siswa')->user()->id)->update([
                'id_jurusan' => $request->id_jurusan,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($password),
                'ttl' => $request->ttl,
                'no_telpon' => $request->no_telpon,
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Profile berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Profile tidak ditemukan']);
    }
}
