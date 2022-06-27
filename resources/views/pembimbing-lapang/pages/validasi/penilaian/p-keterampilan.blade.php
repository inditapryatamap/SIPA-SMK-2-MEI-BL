<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="vertical-align: middle;">#</th>
                <th style="vertical-align: middle;">Keterampilan / Sub Keterampilan</th>
                <th style="vertical-align: middle;">Indikator Keberhasilan</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            @for ($i = 0; $i < count($data['keterampilan']); $i++)
                <tr>
                    <form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_update_keterampilan', ['id_keterampilan' => $data['keterampilan'][$i]->id]) }}" class="kt-form">
                    @csrf
                        <td scope="row">{{ (int)$i + 1 }}</td>
                        <td><input name="keterampilan" value="{{ $data['keterampilan'][$i]->keterampilan }}" class="form-control" placeholder="Tuliskan Keterampilan disini ..."/></td>
                        <td><input name="indikator_keberhasilan" value="{{ $data['keterampilan'][$i]->indikator_keberhasilan }}" class="form-control" placeholder="Tuliskan Indikator Keberhasilan disini ..."/></td>
                        <td>
                            <button type="submit" class="btn btn-info">Perbarui</button>
                            <a class="btn btn-danger" href="{{ route('pembimbing-lapang.validasi.penilaian.go_delete_keterampilan', ['id_keterampilan' => $data['keterampilan'][$i]->id]) }}">Hapus</a>
                        </td>
                    </form>
                </tr>
            @endfor
            <form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_save_keterampilan', ['id_magang_pkl' => $data['magang-pkl']->id]) }}" class="kt-form">
                @csrf
                <tr>
                    <td scope="row"></td>
                    <td>
                        <input name="keterampilan" value="{{ old('keterampilan') }}" class="form-control" placeholder="Tuliskan Keterampilan disini ..."/>
                    </td>
                    <td>
                        <input name="indikator_keberhasilan" value="{{ old('indikator_keberhasilan') }}" class="form-control" placeholder="Tuliskan Indikator Keberhasilan disini ..."/>
                    </td>
                    <td><button type="submit" class="btn btn-primary">Tambah</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>