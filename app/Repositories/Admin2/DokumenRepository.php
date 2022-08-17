<?php

namespace App\Repositories\Admin;
use App\Interfaces\Admin\DokumenRepositoryInterface;
use App\Models\DokumenReview;

class DokumenRepository implements DokumenRepositoryInterface 
{
    public function listDokumen($tipe) 
    {
        $data['dokumen'] = DokumenReview::select(
            'siswa.nis',
            'siswa.nama as nama_siswa',
            'pengajuan_magang_pkl.id_jenis_kegiatan',
            'pengajuan_magang_pkl.id_perusahaan',
            'perusahaan.nama_perusahaan',
            'dokumen.id',
            'dokumen.judul_laporan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
            'dokumen.status_guru_pembimbing', 
        )
        ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
        ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->where('tipe', $tipe)
        ->paginate(10);

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