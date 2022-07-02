<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MagangPKL;
use App\Models\Pengumuman;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['pengumuman'] = Pengumuman::select('id', 'pengumuman', 'created_at')->get();
        
        $data['total']['siswa'] = Siswa::count();
        $data['total']['pkl'] = MagangPKL::where('id_jenis_kegiatan', 1)->count();
        $data['total']['magang'] = MagangPKL::where('id_jenis_kegiatan', 2)->count();
        $data['total']['perusahaan'] = Perusahaan::count();

        $data['tahun_keseluruhan'] = date("Y");
        if ($request['tahun_keseluruhan'] != null) {
            $data['tahun_keseluruhan'] = $request['tahun_keseluruhan'];
        }
        $data['keseluruhan']['pkl'] = MagangPKL::whereYear('created_at', '=', $data['tahun_keseluruhan'])->where('id_jenis_kegiatan', 1)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M');
        });

        $data['keseluruhan']['magang'] = MagangPKL::whereYear('created_at', '=', $data['tahun_keseluruhan'])->where('id_jenis_kegiatan', 2)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M');
        });

        $data['rekomendasi'] = MagangPKL::select('perusahaan.nama_perusahaan', 'pengajuan_magang_pkl.id_perusahaan', DB::raw('count(*) as total'))->groupBy('pengajuan_magang_pkl.id_perusahaan', 'perusahaan.nama_perusahaan')->orderBy('total', 'DESC')->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')->get();
        return view('admin.pages.dashboard', compact('data'));
    }
}
