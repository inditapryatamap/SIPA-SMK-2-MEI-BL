<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        return view('landing');
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function loginSiswa()
    {
        return view('siswa.login');
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

        if (Admin::where('nis', $request->nis)->count() > 0 ) {
            if (Auth::guard('admin')->attempt($request->only('nis', 'password'))) {
                $request->session()->regenerate();
                // $this->clearLoginAttempts($request);
                return redirect()->route('admin.dashboard');
            } else {
                $this->incrementLoginAttempts($request);
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(["Incorrect user login details!"]);
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

        if (Siswa::where('nis', $request->nis)->count() > 0) {
            if (Auth::guard('siswa')->attempt($request->only('nis', 'password'))) {
                $request->session()->regenerate();
                return redirect()->route('siswa.dashboard');
            } else {
                $this->incrementLoginAttempts($request);
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(["Incorrect user login details!"]);
            }
        } else {
            return redirect()->back()->withErrors('User tidak ditemukan')->withInput();
        }
    }

    public function postLogout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }else if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } else {
            Auth::guard()->logout();
        }

        return redirect('/');
    }
    
}
