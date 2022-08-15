<?php

namespace App\Repositories\Admin;
use App\Interfaces\Admin\GuruPembimbingRepositoryInterface;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;

class GuruPembimbingRepository implements GuruPembimbingRepositoryInterface 
{
    public function listGuruPembimbing() 
    {
        $data['guru_pembimbing'] = GuruPembimbing::paginate(10);

        return $data;
    }

    public function detailDokumen($id_dokumen)
    {
        return DokumenReview::select(
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'pengajuan_magang_pkl.id_jenis_kegiatan',
            'pengajuan_magang_pkl.id_perusahaan',
            'perusahaan.nama_perusahaan',
            'dokumen.id',
            'dokumen.judul_laporan',
            'dokumen.file_laporan_ms_word',
            'dokumen.file_laporan_pdf',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
            'dokumen.status_guru_pembimbing', 
        )
        ->where('dokumen.id', $id_dokumen)
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->first();
    }
}