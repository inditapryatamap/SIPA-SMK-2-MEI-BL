@include('admin.frame.header')
@include('flash')
<div class="kt-portlet">
    <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::Total Profit-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Siswa
                            </h4>
                            <span class="kt-widget24__desc">
                                Siswa yang terdaftar
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-brand">
                            <a href="{{ route('export.siswa') }}">
                                {{ $data['total']['siswa'] }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Feedbacks-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Siswa PKL
                            </h4>
                            <span class="kt-widget24__desc">
                                Siswa yang telah PKL
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-warning">
                            <a class="text-warning" href="{{ url('export/siswa?type=pkl') }}">
                                {{ $data['total']['pkl'] }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Siswa Magang
                            </h4>
                            <span class="kt-widget24__desc">
                                Siswa yang telah Magang
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-danger">
                            <a href="{{ url('export/siswa?type=magang') }}">
                                {{ $data['total']['magang'] }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Daftar Perusahaan
                            </h4>
                            <span class="kt-widget24__desc">
                                Perusahaan yang terdaftar
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-success">
                            <a href="{{ route('export.perusahaan') }}">
                                {{ $data['total']['perusahaan'] }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-no-padding row-col-separator-xl">
    <div class="col-md-12 col-lg-8 col-xl-8 pr-2">

        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-xl-12">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <form method="POST" action="{{ route('admin.pengumuman.go_create_pengumuman') }}">
                                    @csrf
                                    <textarea name="pengumuman" id="tiny">
                                        <p>Tulis, <span><strong>Pengumuman</strong> disini ...</span></p>
                                    </textarea>
                                    <button type="submit" class="btn btn-primary mt-3">Buat Pengumuman</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-xl-6">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header">
                                    <h3 class="kt-widget14__title">
                                        Grafik Keselarasan Jurusan
                                    </h3>
                                    <span class="kt-widget14__desc">
                                        Periode Jan - Des 2021
                                    </span>
                                </div>
                                <div class="kt-widget14__content">
                                    <div class="kt-widget14__legends">
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet" style="background: #0E961C"></span>
                                            <span class="kt-widget14__stats">{{ $data['kuesioner']['tinggi'] }} Tinggi</span>
                                        </div>
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet" style="background: #FF8A00"></span>
                                            <span class="kt-widget14__stats">{{ $data['kuesioner']['sama'] }} Sama</span>
                                        </div>
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet" style="background: #FF0000"></span>
                                            <span class="kt-widget14__stats">{{ $data['kuesioner']['rendah'] }} Rendah</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget14__chart">
                                        <div class="kt-widget14__stat"></div>
                                        <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header">
                                    <h3 class="kt-widget14__title">
                                        Tempat PKL Rekomendasi
                                    </h3>
                                    <span class="kt-widget14__desc">
                                        Jurusan Teknik Audio-Video
                                    </span>
                                </div>
                                <div class="kt-widget14__content2">
                                    @for ($i = 0; $i < count($data['rekomendasi']); $i++)
                                        <?php
                                            $total = (int)$data['total']['pkl'] + (int)$data['total']['magang'];
                                            $percent = $data['rekomendasi'][$i]->total / $total * 100; 
                                        ?>
                                        @if ($i === 0)
                                            <div class="cor mb-4" style="width: 100%">
                                                <div class="diws">
                                                    <h6>{{ $data['rekomendasi'][$i]->nama_perusahaan }}</h6>
                                                    {{-- <h6>{{ $data['rekomendasi'][$i]->total }}</h6> --}}
                                                </div>
                                                
                                                <div class="progress" style="width: 100%">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ number_format((float)$percent, 2, '.', '') }}%; background: #0E961C" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @elseif ($i === 1)
                                            <div class="cor mb-4" style="width: 100%">
                                                <div class="diws">
                                                    <h6>{{ $data['rekomendasi'][$i]->nama_perusahaan }}</h6>
                                                    {{-- <h6>{{ $data['rekomendasi'][$i]->total }}</h6> --}}
                                                </div>
                                                <div class="progress" style="width: 100%">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ number_format((float)$percent, 2, '.', '') }}%; background: #FF8A00" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @elseif ($i === 2)
                                            <div class="cor" style="width: 100%">
                                                <div class="diws">
                                                    <h6>{{ $data['rekomendasi'][$i]->nama_perusahaan }}</h6>
                                                    {{-- <h6>{{ $data['rekomendasi'][$i]->total }}</h6> --}}
                                                </div>
                                                <div class="progress" style="width: 100%">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ number_format((float)$percent, 2, '.', '') }}%; background: #FF0000" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
        
                        <!--end:: Widgets/Revenue Change-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4 col-xl-4 pl-2">
        <div class="row row-no-padding row-col-separator-xl">
            @for ($i = 0; $i < count($data['pengumuman']); $i++)
                <div class="col-xl-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $data['pengumuman'][$i]->created_at->format('d F Y') }}</h6>
                            @if (strlen($data['pengumuman'][$i]->pengumuman) > 200)
                                <p>
                                    {!! substr($data['pengumuman'][$i]->pengumuman, 0 ,200) !!} ...
                                </p>
                            @else
                                <p>
                                    {!! $data['pengumuman'][$i]->pengumuman !!}
                                </p> 
                            @endif
                            <a class=" mr-4" href="{{ route('admin.pengumuman.detail', ['id_pengumuman' => $data['pengumuman'][$i]->id]) }}" >Selengkapnya</a>
                            <a href="{{ route('admin.pengumuman.go_delete_pengumuman', ['id_pengumuman' => $data['pengumuman'][$i]->id]) }}" class="text-danger">Hapus Pengumuman</a>
                        </div>
                    </div>
                </div>
            @endfor
            
        </div>
    </div>
</div>


@include('admin.frame.footer')

<script>
     var keseluruhan = {!! json_encode($data['keseluruhan']) !!};
     var keselarasan = {!! json_encode($data['kuesioner']) !!};
</script>
<script src="https://cdn.tiny.cloud/1/slf3u9ys2abipsnpwmrcxbcaoo7e79b7fsetpb3hvl2i8u6l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
<script src="{{ url('assets') }}/dashboard.js" type="text/javascript"></script>
