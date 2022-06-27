<form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_save_surat_keterangan', ['id_magang_pkl' => $data['magang-pkl']->id]) }}" class="">
    @csrf
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th style="vertical-align: middle;">#</th>
                    <th style="vertical-align: middle;">Aspek Penilaian</th>
                    <th style="vertical-align: middle;">Nilai</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                @for ($i = 0; $i < count($data['surat-keterangan']); $i++)
                <input type="hidden" name="id_mn_surat_keterangan[]" value="{{ $data['surat-keterangan'][$i]->id }}">
                    <tr>
                        <td scope="row">{{ (int)$i + 1 }}</td>
                        <td>{{ $data['surat-keterangan'][$i]->aspek_penilaian }}</td>
                        <td>
                            
                            @if ($data['surat-keterangan'][$i]->nilai == 3)
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--success">
                                    <input checked type="radio" value="3" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Memuaskan
                                </label>
                            @else
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--success">
                                    <input type="radio" value="3" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Memuaskan
                                </label>
                            @endif

                            @if ($data['surat-keterangan'][$i]->nilai == 2)
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--info">
                                    <input checked type="radio" value="2" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Baik
                                </label>
                            @else
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--info">
                                    <input type="radio" value="2" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Baik
                                </label>
                            @endif
                            
                            @if ($data['surat-keterangan'][$i]->nilai == 1)
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--warning">
                                    <input checked type="radio" value="1" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Cukup
                                </label>
                            @else
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--warning">
                                    <input type="radio" value="1" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Cukup
                                </label>
                            @endif
                            
                            
                            @if ($data['surat-keterangan'][$i]->nilai == 0 && $data['surat-keterangan'][$i]->nilai != null)
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--danger">
                                    <input checked type="radio" value="0" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Kurang
                                </label>
                            @else
                                <label class="kt-radio ml-4 kt-radio--solid kt-radio--danger">
                                    <input type="radio" value="0" name="input_aspek_penilaian[]-{{ $data['surat-keterangan'][$i]->id }}"/>
                                    <span></span>Kurang
                                </label>
                            @endif
                            
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>