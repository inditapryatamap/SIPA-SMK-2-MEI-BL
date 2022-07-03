<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="vertical-align: middle;">#</th>
                <th style="vertical-align: middle;">Aspek Penilaian</th>
                <th style="vertical-align: middle;">Nilai</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @for ($i = 0; $i < count($data['penilaian']['surat-keterangan']); $i++)
            <input type="hidden" name="id_mn_surat_keterangan[]" value="{{ $data['penilaian']['surat-keterangan'][$i]->id }}">
                <tr>
                    <td scope="row">{{ (int)$i + 1 }}</td>
                    <td>{{ $data['penilaian']['surat-keterangan'][$i]->aspek_penilaian }}</td>
                    <td>
                        
                        @if ($data['penilaian']['surat-keterangan'][$i]->nilai == 3)
                            Memuaskan
                        @endif

                        @if ($data['penilaian']['surat-keterangan'][$i]->nilai == 2)
                            Baik
                        @endif
                        
                        @if ($data['penilaian']['surat-keterangan'][$i]->nilai == 1)
                            Cukup
                        @endif
                        
                        
                        @if ($data['penilaian']['surat-keterangan'][$i]->nilai == 0 && $data['penilaian']['surat-keterangan'][$i]->nilai != null)
                            Kurang
                        @endif
                        
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>