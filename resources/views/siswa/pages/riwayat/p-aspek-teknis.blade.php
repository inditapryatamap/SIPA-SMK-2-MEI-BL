<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="vertical-align: middle;">Huruf</th>
                <th style="vertical-align: middle; width: 200px">Angka</th>
                <th style="vertical-align: middle; width: 150px">Kualifikasi</th>
                <th style="vertical-align: middle;">Indikator</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td>A</td>
                <td>9,00 - 10,00</td>
                <td>Amat Baik</td>
                <td>Semua tugas yang dibebankan berhasil dengan baik, mutu paling tinggi dalam standar produksi</td>
            </tr>
            <tr>
                <td>B</td>
                <td>8,00 - 8,99</td>
                <td>Baik</td>
                <td>Semua tugas yang dibebankan berhasil dengan baik dan lancar, hanya terdapat kesalahan - kesalahan kecil : mutu tinggi dalam pekerjaan</td>
            </tr>
            <tr>
                <td>C</td>
                <td>7,00 - 7,99</td>
                <td>Cukup</td>
                <td>Hanya mencukupi untuk persyaratan minimal yang diharapkan dari tenaga kerja yang ada</td>
            </tr>
            <tr>
                <td>D</td>
                <td>0 - 6,99</td>
                <td>Kurang</td>
                <td>Tidak mencukupi untuk memenuhi persayratan minimal yang diharapkan dari tenaga kerja</td>
            </tr>
        </tbody>
    </table>
</div>
<?php $hasilAspek = 0 ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="vertical-align: middle;">#</th>
                <th style="vertical-align: middle;">Jenis Keterampilan</th>
                <th style="vertical-align: middle;">Nilai</th>
                <th style="vertical-align: middle;">Keterangan</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @for ($i = 0; $i < count($data['penilaian']['aspek-teknis']); $i++)
                <tr>
                    <td>{{ (int)$i + 1 }}</td>
                    <td>{{ $data['penilaian']['aspek-teknis'][$i]->jenis_keterampilan }}</td>
                    <td>{{ $data['penilaian']['aspek-teknis'][$i]->nilai }}</td>
                    <td>{{ $data['penilaian']['aspek-teknis'][$i]->keterangan }}</td>
                    {{ $hasilAspek += (int)$data['penilaian']['aspek-teknis'][$i]->nilai }}
                </tr>
            @endfor
            <tr>
                <td colspan="2">Jumlah</td>
                <td colspan="3" class="bg-success text-white">{{ $hasilAspek }}</td>
            </tr>
        </tbody>
    </table>
</div>