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
            <h1 class="text-black">KETERAMPILAN YANG BERTAMBAH DI DUNIA USAHA / INDUSTRI</h1>
        </div>
    </div>
    <div class="row mt-5" style="margin-bottom: 40px;">
        <div class="col-md-3">
            <h5 class="text-black">NAMA SISWA</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_siswa }}</h5>
        </div>
        <div class="col-md-3">
            <h5 class="text-black">JURUSAN</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_jurusan }}</h5>
        </div>
        <div class="col-md-3">
            <h5 class="text-black">PERUSAHAAN</h5>
        </div>
        <div class="col-md-9">
            <h5 class="text-black">: {{ $data['magang_pkl']->nama_perusahaan }}</h5>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th style="vertical-align: middle;">NO</th>
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
    </div>

    <div class="row mt-5">
        <div class="col-md-6 text-center">
        </div>
        <div class="col-md-6 text-center">
            <p class="font-bold text-black">Pembimbing Lapang / Perusahaan</p>
            <p class="signature-enter">( ........................................................................... )</p>
        </div>
    </div>
</div>

<script>
    window.print();
</script>