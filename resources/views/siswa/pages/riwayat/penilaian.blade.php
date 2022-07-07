@include('siswa.frame.header')
<link href="{{ url('assets') }}/css/demo1/pages/general/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
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

    .kt-wizard-v1__content {
        width: 100%;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    
    @if (!empty($data['penilaian']))
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                    <div class="kt-grid__item">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v1__nav">
                            <div class="kt-wizard-v1__nav-items">
                                <a class="kt-wizard-v1__nav-item cursor-pointer" data-ktwizard-type="step" data-ktwizard-state="current">
                                    <div class="kt-wizard-v1__nav-body" style="width: 20%">
                                        <div class="kt-wizard-v1__nav-label">
                                            1) Jenis Kegiatan Yang Akan Dilaksanakan Di DU/DI
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item cursor-pointer" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body" style="width: 20%">
                                        <div class="kt-wizard-v1__nav-label">
                                            2) Keterampilan Yang Bertambah Di DU/DI
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item cursor-pointer" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body" style="width: 20%">
                                        <div class="kt-wizard-v1__nav-label">
                                            3) Surat Keterangan
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item cursor-pointer" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body" style="width: 20%">
                                        <div class="kt-wizard-v1__nav-label">
                                            4) Laporan Penilaian Kepribadian
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item cursor-pointer" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body" style="width: 20%">
                                        <div class="kt-wizard-v1__nav-label">
                                            5) Aspek Teknis dan Catatan Aspek Teknis
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                        <!--begin: Form Wizard Form-->
                       
                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v1__content mt-5 mb-5" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">Jenis Kegiatan Yang Akan Dilaksanakan Di DU/DI</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v1__form mt-3">
                                        <a href="{{ route('riwayat.penilaian.print.pt_jenis_kegiatan', ['id_pengajuan' => $data['magang_pkl']->id]) }}" class="btn btn-primary mb-3">Print Nilai Jenis Kegiatan</a>
                                        @include('siswa.pages.riwayat.p-jenis-kegiatan')
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v1__content mt-5 mb-5" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Keterampilan Yang Bertambah Di DU/DI</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v1__form">
                                        <a href="{{ route('riwayat.penilaian.print.pt_keterampilan', ['id_pengajuan' => $data['magang_pkl']->id]) }}" class="btn btn-primary mb-3">Print Nilai Keterampilan</a>
                                        @include('siswa.pages.riwayat.p-keterampilan')
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="kt-wizard-v1__content mt-5 mb-5" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Surat Keterangan</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v1__form">
                                        <a href="{{ route('riwayat.penilaian.print.pt_surat_keterangan', ['id_pengajuan' => $data['magang_pkl']->id]) }}" class="btn btn-primary mb-3">Print Nilai Surat Keterangan</a>
                                        @include('siswa.pages.riwayat.p-surat-keterangan')
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 3-->

                            <!--begin: Form Wizard Step 4-->
                            <div class="kt-wizard-v1__content mt-5 mb-5" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Laporan Penilaian Kepribadian</div>
                                <div class="kt-wizard-v1__form">
                                    <a href="{{ route('riwayat.penilaian.print.pt_kepribadian', ['id_pengajuan' => $data['magang_pkl']->id]) }}" class="btn btn-primary mb-3">Print Nilai Kepribadian</a>
                                    @include('siswa.pages.riwayat.p-kepribadian')
                                </div>
                            </div>

                            <!--end: Form Wizard Step 4-->

                            <!--begin: Form Wizard Step 5-->
                            <div class="kt-wizard-v1__content mt-5 mb-5" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Aspek Teknis dan Catatan Aspek Teknis</div>
                                <a href="{{ route('riwayat.penilaian.print.pt_aspek_teknis', ['id_pengajuan' => $data['magang_pkl']->id]) }}" class="btn btn-primary mb-3">Print Nilai Aspek Teknis</a>
                                @include('siswa.pages.riwayat.p-aspek-teknis')
                            </div>
                            
                        
                    </div>
                    <div class="kt-form__actions2 mt-4 text-right">
                        <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                            Sebelumnya
                        </div>
                        {{-- <button id="btn-submit-dokumen-review" type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                            Submit
                        </button> --}}
                        <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                            Selanjutnya
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @else
    <div class="col-lg-12 mb-3">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="text-black font-bold">Penilaian</h4>
                <p class="text-black mb-3">Hasil kegiatan yang sudah dilakukan</p>
                <form method="GET" action="{{ route('riwayat.penilaian.list') }}">
                    <label class="label-input">Kegiatan</label>
                    <select class="form-control" name="magang-pkl">
                        @for ($i = 0; $i < count($data['magang_pkl']); $i++)
                            <option value={{ $data['magang_pkl'][$i]->id }}>{{ $data['magang_pkl'][$i]->jenis_kegiatan }} di {{ $data['magang_pkl'][$i]->nama_perusahaan }}</option>
                        @endfor
                    </select>
                    <button class="btn btn-primary mt-2">Tampilkan</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@include('siswa.frame.footer')
<script src="{{ url('assets') }}/js/demo1/pages/wizard/wizard-1.js" type="text/javascript"></script>