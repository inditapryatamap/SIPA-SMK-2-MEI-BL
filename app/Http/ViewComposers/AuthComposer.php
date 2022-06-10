<?php

namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AuthComposer
{
    public function compose(View $view)
    {
        $user = Auth::guard('admin')->user();
        $role = 'Admin';
        if ($user == null) {
            $user = Auth::guard('siswa')->user();
            $role = 'Siswa';
        }

        // if ($user == null) {
        //     $user = Auth::guard('guru')->user();
        //     $role = 'Guru';
        // }

        $view->with('users', $user);
        $view->with('roles', $role);
        // if (session()->get('auth_key') == null || session()->get('instansi_id') == null || session()->get('username') == null || session()->get('email') == null) {
        //     return redirect()->route('login');
        // }
    }
}