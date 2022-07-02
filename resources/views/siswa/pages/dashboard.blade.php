@include('siswa.frame.header')
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
                            {{ $data['total']['siswa'] }}
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
                            {{ $data['total']['pkl'] }}
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
                            {{ $data['total']['magang'] }}
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
                            {{ $data['total']['perusahaan'] }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-no-padding row-col-separator-xl">
    <div class="col-md-12 col-lg-8 col-xl-8">

        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-xl-12">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header">
                                    <h3 class="kt-widget14__title">
                                        Grafik Keseluruhan
                                    </h3>
                                    <span class="kt-widget14__desc">
                                        Periode Jan - Des 2021
                                    </span>
                                </div>
                                <div class="kt-widget14__content">
                                    <canvas id="kt_chart_keseluruhan" style="width: 100%;"></canvas>
                                </div>
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
                                            <span class="kt-widget14__stats">37% Tinggi</span>
                                        </div>
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet" style="background: #FF8A00"></span>
                                            <span class="kt-widget14__stats">47% Sama</span>
                                        </div>
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet" style="background: #FF0000"></span>
                                            <span class="kt-widget14__stats">19% Rendah</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget14__chart">
                                        <div class="kt-widget14__stat">45</div>
                                        <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
        
                        <!--begin:: Widgets/Revenue Change-->
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
                                    <div class="cor mb-4" style="width: 100%">
                                        <div class="diws">
                                            <h6>Raja Komputer</h6>
                                            <h6>50</h6>
                                        </div>
                                        <div class="progress" style="width: 100%">
                                            <div class="progress-bar" role="progressbar" style="width: 25%; background: #0E961C" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="cor mb-4" style="width: 100%">
                                        <div class="diws">
                                            <h6>Raja Komputer</h6>
                                            <h6>50</h6>
                                        </div>
                                        <div class="progress" style="width: 100%">
                                            <div class="progress-bar" role="progressbar" style="width: 25%; background: #FF8A00" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="cor" style="width: 100%">
                                        <div class="diws">
                                            <h6>Raja Komputer</h6>
                                            <h6>50</h6>
                                        </div>
                                        <div class="progress" style="width: 100%">
                                            <div class="progress-bar" role="progressbar" style="width: 25%; background: #FF0000" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!--end:: Widgets/Revenue Change-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('siswa.frame.footer')

<script>
     var keseluruhan = {!! json_encode($data['keseluruhan']) !!};
</script>
<script src="{{ url('assets') }}/dashboard.js" type="text/javascript"></script>
