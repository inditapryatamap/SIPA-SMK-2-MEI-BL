<?php
  
namespace App\Exports;

use App\Models\GuruPembimbing;
use App\Models\PembimbingLapang;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PerusahaanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perusahaan::select(
            "perusahaan.nama_perusahaan", 
            "pembimbing_lapang.nama", 
            "perusahaan.profile_perusahaan", 
            "perusahaan.alamat_perusahaan", 
            "perusahaan.no_telp", 
            "perusahaan.deskripsi_pekerjaan", 
            )
            ->join('pembimbing_lapang', 'pembimbing_lapang.id', 'perusahaan.id_pembimbing_lapang')
            ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Nama", "Pembimbing Lapang", "Profile", "Alamat", "Nomor Telepon", "Deskripsi Pekerjaan"];
    }
}