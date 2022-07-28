<?php
  
namespace App\Exports;

use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::select(
            "siswa.nama", 
            "siswa.nis",
            "jurusan.nama_jurusan",
            "siswa.jenis_kelamin",
            "siswa.ttl",
            "siswa.no_telpon",
            )
            ->join('jurusan', 'jurusan.id', 'siswa.id_jurusan')
            ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Nama", "NIS", "Jurusan", "Jenis Kelamin", "Tempat Tanggal Lahir", "Nomor Telepon"];
    }
}