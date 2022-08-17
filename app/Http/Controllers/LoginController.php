<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\GuruPembimbing;
use App\Models\PembimbingLapang;
use App\Models\Siswa;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        // $this->middleware('guest:siswa')->except('postLogout');
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function loginSiswa()
    {
        return view('siswa.login');
    }

    public function loginGuruPembimbing()
    {
        return view('guru-pembimbing.login');
    }

    public function loginPembimbingLapang()
    {
        return view('pembimbing-lapang.login');
    }

    public function goLoginAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'string', 'max:100', 'min:6'],
            'password' => ['required', 'string', 'max:255', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Admin::where('nis', $request->nis)->exists()) {
            $data = Admin::where('nis', $request->nis)->first();
            if (!Hash::check($request->password, $data->password)) {
                return redirect()->back()->withInput()->withErrors('Password tidak cocok');
            }

            if (Auth::guard('admin')->attempt($request->only('nis', 'password'))) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(["Gagal menghubungkan" . Auth::guard('admin')->attempt($request->only('nis', 'password'))]);
            }
        } else {
            return redirect()->back()->withErrors('User tidak ditemukan')->withInput();
        }
    }

    public function goLoginSiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'string', 'max:100', 'min:6'],
            'password' => ['required', 'string', 'max:255', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Siswa::where('nis', $request->nis)->exists()) {
            $data = Siswa::where('nis', $request->nis)->first();
            if (!Hash::check($request->password, $data->password)) {
                return redirect()->back()->withInput()->withErrors('Password tidak cocok');
            }
            
            if (Auth::guard('siswa')->attempt($request->only('nis', 'password'))) {
                return redirect()->route('siswa.dashboard');
            } else {
                return redirect()->back()->withInput()->withErrors(["Gagal menghubungkan" . Auth::guard('siswa')->attempt($request->only('nis', 'password'))]);
            }
        } else {
            return redirect()->back()->withErrors('User tidak ditemukan')->withInput();
        }
    }

    public function goLoginGuruPembimbing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'string', 'max:100', 'min:6'],
            'password' => ['required', 'string', 'max:255', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (GuruPembimbing::where('nis', $request->nis)->exists()) {
            $data = GuruPembimbing::where('nis', $request->nis)->first();
            if (!Hash::check($request->password, $data->password)) {
                return redirect()->back()->withInput()->withErrors('Password tidak cocok');
            }
            
            if (Auth::guard('guru-pembimbing')->attempt($request->only('nis', 'password'))) {
                return redirect()->route('guru-pembimbing.dashboard');
            } else {
                return redirect()->back()->withInput()->withErrors(["Gagal menghubungkan" . Auth::guard('guru-pembimbing')->attempt($request->only('nis', 'password'))]);
            }
        } else {
            return redirect()->back()->withErrors('Guru pembimbing tidak ditemukan')->withInput();
        }
    }

    public function goLoginPembimbingLapang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max:100', 'min:6'],
            'password' => ['required', 'string', 'max:255', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (PembimbingLapang::where('email', $request->email)->exists()) {
            $data = PembimbingLapang::where('email', $request->email)->first();
            if (!Hash::check($request->password, $data->password)) {
                return redirect()->back()->withInput()->withErrors('Password tidak cocok');
            }
            
            if (Auth::guard('pembimbing-lapang')->attempt($request->only('email', 'password'))) {
                return redirect()->route('pembimbing-lapang.dashboard');
            } else {
                return redirect()->back()->withInput()->withErrors(["Gagal menghubungkan" . Auth::guard('pembimbing-lapang')->attempt($request->only('email', 'password'))]);
            }
        } else {
            return redirect()->back()->withErrors('Pembimbing lapang tidak ditemukan')->withInput();
        }
    }

    public function postLogout()
    {
        if (Auth::guard('admin')->user() != null) {
            Auth::guard('admin')->logout();
        }else if (Auth::guard('siswa')->user() != null) {
            Auth::guard('siswa')->logout();
        } else if (Auth::guard('guru-pembimbing')->user() != null) {
            Auth::guard('guru-pembimbing')->logout();
        } else if (Auth::guard('pembimbing-lapang')->user() != null) {
            Auth::guard('pembimbing-lapang')->logout();
        }  else {
            Auth::guard()->logout();
        }

        return redirect('/');
    }
    
}
