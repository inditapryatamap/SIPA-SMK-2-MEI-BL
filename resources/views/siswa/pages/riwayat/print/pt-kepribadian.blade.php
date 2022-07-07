@include('siswa.pages.riwayat.print.pt-head')

<style>
    .table thead th {
        border-bottom: 1px solid #000;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #000;
    }
</style>

<div class="container-pt">
    <div class="row mt-5">
        <div class="col-md-12 mb-5 text-center">
            <h1 class="text-black">LAPORAN PENILAIAN KEPRIBADIAN</h1>
        </div>
    </div>
    <div class="row mt-5" style="margin-bottom: 40px;">
        <div class="col-md-2">
            <h5 class="text-black">Program Keahlian</h5>
        </div>
        <div class="col-md-4">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_jurusan }}</h5>
        </div>
        <div class="col-md-2">
            <h5 class="text-black">Nama Siswa</h5>
        </div>
        <div class="col-md-4">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_siswa }}</h5>
        </div>
        <div class="col-md-2">
            <h5 class="text-black">NIS</h5>
        </div>
        <div class="col-md-4">
            <h5 class="text-black">: {{ $data['magang_pkl']->nis }}</h5>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="3" style="vertical-align: middle;">#</th>
                        <th rowspan="3" style="vertical-align: middle;">Aspek yang Dinilai</th>
                        <th colspan="4" style="vertical-align: middle;">Hasil Hasil Penilaian</th>
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
                    @for ($i = 0; $i < count($data['penilaian']['kepribadian']); $i++)
                        <input type="hidden" name="id_mn_surat_kepribadian[]" value="{{ $data['penilaian']['kepribadian'][$i]->id }}">
                        <tr>
                            <td>{{ (int)$i + 1 }}</td>
                            <td>{{ $data['penilaian']['kepribadian'][$i]->aspek_penilaian }}</td>
                            @if ($data['penilaian']['kepribadian'][$i]->nilai >= 9 && $data['penilaian']['kepribadian'][$i]->nilai <= 10)
                                <td>{{ $data['penilaian']['kepribadian'][$i]->nilai }}</td>
                            @else
                                <td>0</td>
                            @endif
                            
                            @if ($data['penilaian']['kepribadian'][$i]->nilai >= 8 && $data['penilaian']['kepribadian'][$i]->nilai <= 8.99)
                                <td>{{ $data['penilaian']['kepribadian'][$i]->nilai }}</td>
                            @else
                                <td>0</td>
                            @endif
    
                            @if ($data['penilaian']['kepribadian'][$i]->nilai >= 7 && $data['penilaian']['kepribadian'][$i]->nilai <= 7.99)
                                <td>{{ $data['penilaian']['kepribadian'][$i]->nilai }}</td>
                            @else
                                <td>0</td>
                            @endif
    
                            @if ($data['penilaian']['kepribadian'][$i]->nilai > 0 && $data['penilaian']['kepribadian'][$i]->nilai <= 6.99)
                                <td>{{ $data['penilaian']['kepribadian'][$i]->nilai }}</td>
                            @else
                                <td>0</td>
                            @endif
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <p class="font-bold text-black">Koordinator PSG,</p>
            <p class="signature-enter">( ........................................................................... )</p>
        </div>
        <div class="col-md-4 text-center">
            <p class="font-bold text-black">Pimpinan Perusahaan,</p>
            <p class="signature-enter">( ........................................................................... )</p>
        </div>
        <div class="col-md-4 text-center">
            <p class="font-bold text-black">Pelatih Industri,</p>
            <p class="signature-enter">( ........................................................................... )</p>
        </div>
    </div>
</div>

<script>
    window.print();
</script>