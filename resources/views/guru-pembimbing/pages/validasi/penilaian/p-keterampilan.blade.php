<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="vertical-align: middle;">#</th>
                <th style="vertical-align: middle;">Keterampilan / Sub Keterampilan</th>
                <th style="vertical-align: middle;">Indikator Keberhasilan</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @for ($i = 0; $i < count($data['penilaian']['keterampilan']); $i++)
                <tr>
                    <td scope="row">{{ (int)$i + 1 }}</td>
                    <td>{{ $data['penilaian']['keterampilan'][$i]->keterampilan }}</td>
                    <td>{{ $data['penilaian']['keterampilan'][$i]->indikator_keberhasilan }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>