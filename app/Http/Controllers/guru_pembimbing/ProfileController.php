<?php
namespace App\Http\Controllers\guru_pembimbing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuruPembimbing;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = GuruPembimbing::where('id', Auth::guard('guru-pembimbing')->user()->id)->first();
        return view('guru-pembimbing.pages.profile', compact('data'));
    }

    public function go_update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'nis' => ['required', 'string'],
            'email' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $password = '';
        if ($request->password == null) {
            $password = Auth::guard('guru-pembimbing')->user()->password;
        } else {
            $password = $request->password;
        }

        if (GuruPembimbing::where('id', Auth::guard('guru-pembimbing')->user()->id)->exists()) {
            $query = GuruPembimbing::where('id', Auth::guard('guru-pembimbing')->user()->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($password),
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
