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

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="vertical-align: middle;">#</th>
                <th style="vertical-align: middle;">Jenis Keterampilan</th>
                <th style="vertical-align: middle;">Nilai</th>
                <th style="vertical-align: middle;">Keterangan</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            @for ($i = 0; $i < count($data['aspek-teknis']); $i++)
            <form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_update_aspek_teknis', ['id_aspek_teknis' => $data['aspek-teknis'][$i]->id]) }}" class="kt-form">
                @csrf
                <tr>
                    <td>{{ (int)$i + 1 }}</td>
                    <td><input value="{{ $data['aspek-teknis'][$i]->jenis_keterampilan }}" name="jenis_keterampilan" class="form-control" type="text" /></td>
                    <td><input value="{{ $data['aspek-teknis'][$i]->nilai }}" name="nilai" class="form-control" type="text" /></td>
                    <td><input value="{{ $data['aspek-teknis'][$i]->keterangan }}" name="keterangan" class="form-control" type="text" /></td>
                    <td>
                        <button class="btn btn-info">Perbarui</button>
                        <a href="{{ route('pembimbing-lapang.validasi.penilaian.go_delete_aspek_teknis', ['id_aspek_teknis' => $data['aspek-teknis'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </form>
            @endfor
            <tr>
                <td colspan="2">Jumlah</td>
                <td colspan="3" class="bg-success text-white">0</td>
            </tr>
            <form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_save_aspek_teknis', ['id_magang_pkl' => $data['magang-pkl']->id]) }}" class="kt-form">
                @csrf
                <tr>
                    <td>Action</td>
                    <td><input name="jenis_keterampilan" class="form-control" type="text" /></td>
                    <td><input name="nilai" class="form-control" type="text" /></td>
                    <td><input name="keterangan" class="form-control" type="text" /></td>
                    <td><button type="submit" class="btn btn-primary">Simpan</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>