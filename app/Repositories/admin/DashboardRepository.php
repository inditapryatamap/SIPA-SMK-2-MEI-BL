<?php

namespace App\Repositories\admin;

use App\Interfaces\admin\DashboardRepositoryInterface;
use App\Models\KuesionerJawaban;
use App\Models\MagangPKL;
use App\Models\Pengumuman;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardRepositoryInterface 
{
    public function detailDashboard($request) 
    {
        $data['pengumuman'] = Pengumuman::select('id', 'pengumuman', 'created_at')->get();
        
        $data['total']['siswa'] = Siswa::count();
        $data['total']['pkl'] = MagangPKL::where('id_jenis_kegiatan', 1)->count();
        $data['total']['magang'] = MagangPKL::where('id_jenis_kegiatan', 2)->count();
        $data['total']['perusahaan'] = Perusahaan::count();

        $data['tahun_keseluruhan'] = date("Y");
        if ($request != null) {
            $data['tahun_keseluruhan'] = $request['tahun_keseluruhan'];
        }

        $data['keseluruhan']['pkl'] = MagangPKL::whereYear('created_at', '=', $data['tahun_keseluruhan'])->where('id_jenis_kegiatan', 1)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M');
        });

        $data['keseluruhan']['magang'] = MagangPKL::whereYear('created_at', '=', $data['tahun_keseluruhan'])->where('id_jenis_kegiatan', 2)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M');
        });

        $data['kuesioner']['tinggi'] = KuesionerJawaban::join('kuesioner', 'kuesioner.id', 'kuesioner_jawaban.id_kuesioner')->where([['kuesioner.for', 'siswa'],['kuesioner.type', 'range'],['kuesioner_jawaban.jawaban', '>', 3]])->count();
        $data['kuesioner']['sama'] = KuesionerJawaban::join('kuesioner', 'kuesioner.id', 'kuesioner_jawaban.id_kuesioner')->where([['kuesioner.for', 'siswa'],['kuesioner.type', 'range'],['kuesioner_jawaban.jawaban', '=', 3]])->count();
        $data['kuesioner']['rendah'] = KuesionerJawaban::join('kuesioner', 'kuesioner.id', 'kuesioner_jawaban.id_kuesioner')->where([['kuesioner.for', 'siswa'],['kuesioner.type', 'range'],['kuesioner_jawaban.jawaban', '<', 3]])->count();

        $data['rekomendasi'] = MagangPKL::select('perusahaan.nama_perusahaan', 'pengajuan_magang_pkl.id_perusahaan', DB::raw('count(*) as total'))->groupBy('pengajuan_magang_pkl.id_perusahaan', 'perusahaan.nama_perusahaan')->orderBy('total', 'DESC')->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')->get();
        return $data;
    }
}