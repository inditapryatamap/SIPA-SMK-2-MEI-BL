<?php

namespace App\Http\Controllers\pembimbing_lapang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('admin')->user());
        return view('pembimbing-lapang.pages.dashboard');
    }
}
