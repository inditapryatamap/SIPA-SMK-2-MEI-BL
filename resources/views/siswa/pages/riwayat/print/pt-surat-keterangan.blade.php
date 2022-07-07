@include('siswa.pages.riwayat.print.pt-head')

<style>
    .table thead th {
        border-bottom: 1px solid #000;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #000;
    }
    h5 {
        font-weight: normal
    }
</style>

<div class="container-pt">
    <div class="row mt-5">
        <div class="col-md-12 mb-5 text-center">
            <h1 class="text-black">SURAT KETERANGAN</h1>
            <h4 class="text-black">No : ................................</h4>
        </div>
    </div>
    <div class="row mt-5" style="margin-bottom: 40px;">
        <div class="col-md-12">
            <h5 class="text-black">Yang bertanda tangan dibawah ini :</h5>
        </div>
        <div class="col-md-3 mb-2 mt-2">
            <h5 class="text-black">Nama</h5>
        </div>
        <div class="col-md-9 mb-2 mt-2">
            <h5 class="text-black">: ..................................................................</h5>
        </div>
        <div class="col-md-3 mb-2 mt-2">
            <h5 class="text-black">Jabatan</h5>
        </div>
        <div class="col-md-9 mb-2 mt-2">
            <h5 class="text-black">: ..................................................................</h5>
        </div>
        <div class="col-md-12 mt-2">
            <h5 class="text-black">Menerangkan bahwa siswa SMK 2 Mei Bandar Lampung tersebut di bawah ini :</h5>
        </div>
        <div class="col-md-3 mb-2 mt-2">
            <h5 class="text-black">Nama</h5>
        </div>
        <div class="col-md-9 mb-2 mt-2">
            <h5 class="text-black font-bold">: {{ $data['magang_pkl']->nama_perusahaan }}</h5>
        </div>
        <div class="col-md-3 mb-2 mt-2">
            <h5 class="text-black">No Induk Siswa</h5>
        </div>
        <div class="col-md-9 mb-2 mt-2">
            <h5 class="text-black font-bold">: {{ $data['magang_pkl']->nama_perusahaan }}</h5>
        </div>
        <div class="col-md-3 mb-2 mt-2">
            <h5 class="text-black">Jurusan</h5>
        </div>
        <div class="col-md-9 mb-2 mt-2">
            <h5 class="text-black font-bold">: {{ $data['magang_pkl']->nama_perusahaan }}</h5>
        </div>
        <div class="col-md-12 mt-2">
            <h5 class="text-black">Telah mengikuti Praktek Kerja Lapangan (PKL) pada perusahaan yang kami pimpin selama ..... bulan dari tanggal .... sampai dengan tanggal .....</h5>
        </div>

        <div class="col-md-12 mt-5">
            <h5 class="text-black">Adapun hasil-hasil yang dapat kami simpulkan adalah sebagai berikut :</h5>
        </div>

        <div class="col-md-12 mt-2">
            @for ($i = 0; $i < count($data['penilaian']['surat-keterangan']); $i++)
                <div class="ct-pt-surat-keterangan">
                    <div class="cfk">
                        <h5 class="text-black">{{ (int)$i + 1 }}. {{ $data['penilaian']['surat-keterangan'][$i]->aspek_penilaian }}</h5>
                    </div>
                    <div class="cfa">
                        <h5 class="text-black font-bold">: 
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
                        </h5>
                    </div>
                    
                </div>
            @endfor
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 text-center">
        </div>
        <div class="col-md-6 text-center">
            <p class="font-bold text-black">Kepala Jabatan / Pimpinan Direktur Perusahaan,</p>
            <p class="signature-enter">( ........................................................................... )</p>
        </div>
    </div>
</div>

<script>
    window.print();
</script>