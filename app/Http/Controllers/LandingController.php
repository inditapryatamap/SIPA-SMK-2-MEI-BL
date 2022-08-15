<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\GuruPembimbing;
use App\Models\PembimbingLapang;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }

    public function go_forgot_password(Request $request)
    {
        $password = Hash::make('123456');
        if ($request->role === 'siswa') {
            
            if (Siswa::where('email', $request->email)->exists()) {
                Siswa::where('email', $request->email)->update([
                    'password' => $password
                ]);
            } else {
                return redirect()->back()->with(['errors' => 'Pengguna tidak ditemukan']);
            }

        } else if ($request->role === 'guru_pembimbing'){
            if (GuruPembimbing::where('email', $request->email)->exists()) {
                GuruPembimbing::where('email', $request->email)->update([
                    'password' => $password
                ]);
            } else {
                return redirect()->back()->with(['errors' => 'Pengguna tidak ditemukan']);
            }
        } else {
            if (PembimbingLapang::where('email', $request->email)->exists()) {
                PembimbingLapang::where('email', $request->email)->update([
                    'password' => $password
                ]);
            } else {
                return redirect()->back()->with(['errors' => 'Pengguna tidak ditemukan']);
            }
        }

        Mail::to($request->email)->send(new SendEmail());
        return redirect()->back()->with(['success' => 'Email berhasil dikirim']);
    }
}
