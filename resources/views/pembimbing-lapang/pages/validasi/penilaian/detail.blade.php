@include('pembimbing-lapang.frame.header')

<style>
    .kt-timeline-v3 .kt-timeline-v3__item:before {
        position: absolute;
        display: block;
        width: 0.28rem;
        border-radius: 0.3rem;
        height: 70%;
        left: 9.100000000000001rem;
        top: 0.46rem;
        content: "";
    }
</style>

<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Informasi Kegiatan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Nama Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nama_siswa }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">NIS Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nis }}</span>
                                </div>
                            </div>
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Jenis Kegiatan</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nama_kegiatan }} - {{ $data['magang-pkl']->durasi }} hari</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Perusahaan</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nama_perusahaan }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Jenis Kegiatan yang dilaksanakan di Industri
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <form method="POST" action="{{ route('pembimbing-lapang.validasi.penilaian.go_save_jenis_kegiatan', ['id_magang_pkl' => $data['magang-pkl']->id]) }}" class="kt-form">
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
{{-- 
                                                    <label class="kt-radio ml-4 kt-radio--solid kt-radio--danger">
                                                        <input type="radio" value="false" name="pelaksanaan[]-{{ $data['jenis-kegiatan'][$i]->id_jenis_kegiatan }}">
                                                        <span></span>
                                                    </label> --}}
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pembimbing-lapang.frame.footer')