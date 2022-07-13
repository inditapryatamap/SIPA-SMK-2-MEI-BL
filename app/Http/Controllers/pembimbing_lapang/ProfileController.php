<?php
namespace App\Http\Controllers\pembimbing_lapang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\PembimbingLapang;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = PembimbingLapang::where('id', Auth::guard('pembimbing-lapang')->user()->id)->first();
        return view('pembimbing-lapang.pages.profile', compact('data'));
    }

    public function go_update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'no_telpon' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $password = '';
        if ($request->password == null) {
            $password = Auth::guard('pembimbing-lapang')->user()->password;
        } else {
            $password = $request->password;
        }

        if (PembimbingLapang::where('id', Auth::guard('pembimbing-lapang')->user()->id)->exists()) {
            $query = PembimbingLapang::where('id', Auth::guard('pembimbing-lapang')->user()->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
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
