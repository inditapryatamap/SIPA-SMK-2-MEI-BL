<form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_save_jenis_kegiatan', ['id_magang_pkl' => $data['magang-pkl']->id]) }}" class="">
    @csrf
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
                @for ($i = 0; $i < count($data['jenis-kegiatan']); $i++)
                    <input type="hidden" name="id_mn_kegiatan[]" value="{{ $data['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                    <tr>
                        <th scope="row">{{ (int)$i + 1 }}</th>
                        <td>{{ $data['jenis-kegiatan'][$i]->kompetensi }}</td>
                        <td>
                            @if ($data['jenis-kegiatan'][$i]->pelaksanaan === true)
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--success">
                                    <input checked type="radio" value="true" name="pelaksanaan[]-{{ $data['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                                    <span></span>
                                </label>
                            @else
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--success">
                                    <input type="radio" value="true" name="pelaksanaan[]-{{ $data['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                                    <span></span>
                                </label>
                            @endif
                            
                        </td>
                        <td>
                            @if ($data['jenis-kegiatan'][$i]->pelaksanaan === false)
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--danger">
                                    <input checked type="radio" value="false" name="pelaksanaan[]-{{ $data['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                                    <span></span>
                                </label>
                            @else
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--danger">
                                    <input type="radio" value="false" name="pelaksanaan[]-{{ $data['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                                    <span></span>
                                </label>
                            @endif
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <button class="btn btn-success" type="submit">Simpan</button>
</form>