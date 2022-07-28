<?php
  
namespace App\Exports;

use App\Models\GuruPembimbing;
use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class GuruPembimbingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GuruPembimbing::select(
            "nama", 
            "nis",
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
        return ["Nama", "NIS", "Email", "Nomor Telepon"];
    }
}