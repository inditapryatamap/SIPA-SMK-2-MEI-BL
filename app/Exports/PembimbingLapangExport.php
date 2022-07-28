<?php
  
namespace App\Exports;

use App\Models\GuruPembimbing;
use App\Models\PembimbingLapang;
use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PembimbingLapangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PembimbingLapang::select(
            "nama", 
            "email", 
            "no_telpon",
            )
            ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Nama", "Email", "Nomor Telepon"];
    }
}