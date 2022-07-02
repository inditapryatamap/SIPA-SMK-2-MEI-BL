<form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_save_kepribadian', ['id_magang_pkl' => $data['magang-pkl']->id]) }}" class="">
    @csrf
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th rowspan="3" style="vertical-align: middle;">#</th>
                    <th rowspan="3" style="vertical-align: middle;">Aspek yang Dinilai</th>
                    <th colspan="4" style="vertical-align: middle;">Hasil Hasil Penilaian</th>
                    <th rowspan="3" style="vertical-align: middle;">Nilai</th>
                </tr>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                </tr>
                <tr>
                    <th>9,00 - 10,00</th>
                    <th>8,00 - 8,99</th>
                    <th>7,00 - 7,99</th>
                    <th>0 - 6,99</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @for ($i = 0; $i < count($data['kepribadian']); $i++)
                    <input type="hidden" name="id_mn_surat_kepribadian[]" value="{{ $data['kepribadian'][$i]->id }}">
                    <tr>
                        <td>{{ (int)$i + 1 }}</td>
                        <td>{{ $data['kepribadian'][$i]->aspek_penilaian }}</td>
                        @if ($data['kepribadian'][$i]->nilai >= 9 && $data['kepribadian'][$i]->nilai <= 10)
                            <td>{{ $data['kepribadian'][$i]->nilai }}</td>
                        @else
                            <td>0</td>
                        @endif
                        
                        @if ($data['kepribadian'][$i]->nilai >= 8 && $data['kepribadian'][$i]->nilai <= 8.99)
                            <td>{{ $data['kepribadian'][$i]->nilai }}</td>
                        @else
                            <td>0</td>
                        @endif

                        @if ($data['kepribadian'][$i]->nilai >= 7 && $data['kepribadian'][$i]->nilai <= 7.99)
                            <td>{{ $data['kepribadian'][$i]->nilai }}</td>
                        @else
                            <td>0</td>
                        @endif

                        @if ($data['kepribadian'][$i]->nilai > 0 && $data['kepribadian'][$i]->nilai <= 6.99)
                            <td>{{ $data['kepribadian'][$i]->nilai }}</td>
                        @else
                            <td>0</td>
                        @endif
                        <td><input value="{{ $data['kepribadian'][$i]->nilai }}" name="input_aspek_penilaian[]-{{ $data['kepribadian'][$i]->id }}" class="form-control text-center" type="text" /></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>