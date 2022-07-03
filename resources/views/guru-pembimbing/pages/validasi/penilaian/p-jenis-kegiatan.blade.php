
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th style="vertical-align: middle;" rowspan="2">#</th>
                    <th style="vertical-align: middle;" rowspan="2">Kompetensi / Sub Komeptensi</th>
                    <th colspan="2">Pelaksanaan di Industri</th>
                </tr>
                <tr>
                    <th>YA</th>
                    <th>TIDAK</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @for ($i = 0; $i < count($data['penilaian']['jenis-kegiatan']); $i++)
                    <input type="hidden" name="id_mn_kegiatan[]" value="{{ $data['penilaian']['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                    <tr>
                        <th scope="row">{{ (int)$i + 1 }}</th>
                        <td>{{ $data['penilaian']['jenis-kegiatan'][$i]->kompetensi }}</td>
                        <td>
                            @if ($data['penilaian']['jenis-kegiatan'][$i]->pelaksanaan === true)
                                <i class="flaticon2-check-mark"></i>
                            @endif
                            
                        </td>
                        <td>
                            @if ($data['penilaian']['jenis-kegiatan'][$i]->pelaksanaan === false)
                                <i class="flaticon2-check-mark"></i>
                            @endif
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
