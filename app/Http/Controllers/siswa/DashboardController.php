<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\MagangPKL;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total']['siswa'] = Siswa::count();
        $data['total']['pkl'] = MagangPKL::where('id_jenis_kegiatan', 1)->count();
        $data['total']['magang'] = MagangPKL::where('id_jenis_kegiatan', 2)->count();
        $data['total']['perusahaan'] = Perusahaan::count();

        $data['keseluruhan']['pkl'] = MagangPKL::where('id_jenis_kegiatan', 1)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M');
        });

        $data['keseluruhan']['magang'] = MagangPKL::where('id_jenis_kegiatan', 2)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M');
        });
        // $data['keseluruhan']['magang'] = MagangPKL::where('id_jenis_kegiatan', 2)->count();
        // dd($data['keseluruhan']['pkl']);
        return view('siswa.pages.dashboard', compact('data'));
    }
}
