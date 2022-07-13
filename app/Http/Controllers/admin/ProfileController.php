<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.pages.profile', compact('data'));
    }

    public function go_update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'nis' => ['required', 'string'],
            'email' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $password = '';
        if ($request->password == null) {
            $password = Auth::guard('admin')->user()->password;
        } else {
            $password = $request->password;
        }

        if (Admin::where('id', Auth::guard('admin')->user()->id)->exists()) {
            $query = Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
            ]);

            if ($query) {
                return redirect()->back()->with(['success' => 'Profile berhasil diperbarui']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Profile tidak ditemukan']);
    }
}
