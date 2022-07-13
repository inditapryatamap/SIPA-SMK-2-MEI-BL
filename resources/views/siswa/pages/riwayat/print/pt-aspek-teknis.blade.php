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
            <h1 class="text-black">ASPEK TEKNIS</h1>
        </div>
    </div>
    <div class="row mt-5" style="margin-bottom: 40px;">
        <div class="col-md-3">
            <h5 class="text-black">Nama Siswa</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_siswa }}</h5>
        </div>
        <div class="col-md-3">
            <h5 class="text-black">NIS</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nis }}</h5>
        </div>
        <div class="col-md-3">
            <h5 class="text-black">Jurusan</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_jurusan }}</h5>
        </div>
        <div class="col-md-3">
            <h5 class="text-black">Perusahaan</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_perusahaan }}</h5>
        </div>
    </div>
    <?php $hasilAspek = 0 ?>
    <div class="row mt-5">
        <div class="col-md-12">
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
                        <td colspan="3">{{ $hasilAspek }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 text-center">
        </div>
        <div class="col-md-6 text-center">
            <p class="font-bold text-black">Bandar Lampung, ........... ...........</p>
            <p class="font-bold text-black">Pembimbing Perusahaan</p>
            <p class="signature-enter">( ........................................................................... )</p>
        </div>
    </div>
</div>

<script>
    window.print();
</script>