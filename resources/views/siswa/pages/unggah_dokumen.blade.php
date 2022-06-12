@include('siswa.frame.header')
<link href="{{ url('assets') }}/css/demo1/pages/general/wizard/wizard-1.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-lg-12 mb-4">
        @include('flash')
    </div>
    <div class="col-md-12 mb-4">
        <div class="card radius-10">
            <div class="card-body">
                <h4>Unggah Dokumen Laporan PKL/Magang</h4>
                <p class="mb-0">Silahkan unggah dokumen laporan kegiatan PKL/Magang Anda dan berikan ulasan tentang perusahaan tempat Anda melaksanakan PKL/ Magang</p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                    <div class="kt-grid__item">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v1__nav">
                            <div class="kt-wizard-v1__nav-items">
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="current">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-bus-stop"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            1) Pilih Kegiatan
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-list"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            2) Unggah Dokumen
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-responsive"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            3) Ulasan Perusahaan
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-truck"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            4) Detail Informasi
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-globe"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            5) Selesai
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form method="POST" action="{{ route('go_create_dokumen_review') }}" class="kt-form" enctype="multipart/form-data">
                            @csrf
                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">Setup Your Current Location</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v1__form">
                                        <div class="form-group">
                                            <label>Kegiatan</label>
                                            <select id="select-kegiatan" name="id_magang_pkl" type="text" class="form-control">
                                                <option selected disabled>Pilih kegiatan yang pernah diajukan</option>
                                                @for ($i = 0; $i < count($data['kegiatan']); $i++)
                                                    <option optionAtribute="{{ $data['kegiatan'][$i]->nama_kegiatan }}" value={{ $data['kegiatan'][$i]->id }}>
                                                        {{ $data['kegiatan'][$i]->nama_kegiatan }} - {{ $data['kegiatan'][$i]->durasi }} hari
                                                        di {{ $data['kegiatan'][$i]->nama_perusahaan }}
                                                    </option>
                                                @endfor
                                            </select>
                                            <span class="form-text text-muted">Pilih kegiatan yang pernah diajukan.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Enter the Details of your Delivery</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v1__form">
                                        <div class="form-group">
                                            <label>Judul Laporan</label>
                                            <input type="text" id="judul-laporan" class="form-control" name="judul_laporan">
                                            <span class="form-text text-muted">Judul yang terdapat pada laporan halaman pertama.</span>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>File Microsoft Word</label>
                                                    <input type="file" id="file-ms-word" class="form-control" name="file_laporan_ms_word">
                                                    <span class="form-text text-muted">Upload seluruh laporan dalam format .doc (Microsoft Word)</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>File PDF</label>
                                                    <input type="file" id="file-pdf" class="form-control" name="file_laporan_pdf">
                                                    <span class="form-text text-muted">Upload seluruh laporan dalam format .pdf (Portable Document Format)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Ulasan Perusahaan</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v1__form" id="generateQuestionReview">
                                        
                                    </div>
                                    <input type="hidden" id="dr_sangat_rendah" name="dr_sangat_rendah" />
                                    <input type="hidden" id="dr_rendah" name="dr_rendah" />
                                    <input type="hidden" id="dr_tinggi" name="dr_tinggi" />
                                    <input type="hidden" id="dr_sangat_tinggi" name="dr_sangat_tinggi" />

                                    <input type="hidden" id="dr_total_score" name="dr_total_score" />
                                </div>
                            </div>

                            <!--end: Form Wizard Step 3-->

                            <!--begin: Form Wizard Step 4-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Setup Your Delivery Location</div>
                                <div class="kt-wizard-v1__review">
                                    <div class="kt-wizard-v1__review-item">
                                        <div class="kt-wizard-v1__review-title">
                                            Informasi Kegiatan
                                        </div>
                                        <div class="kt-wizard-v1__review-content">
                                            Kegiatan: <span class="text-highlight">Praktik Kerja Lapangan (PKL) 3 Bulan</span><br />
                                            Jurusan: <span class="text-highlight">Teknik Komputer</span><br />
                                            Perusahaan: <span class="text-highlight">PT Microdata Indonesia</span><br />
                                            Pembimbing: <span class="text-highlight">Bapak Sanriomi Sintaro</span><br />
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v1__review-item">
                                        <div class="kt-wizard-v1__review-title">
                                            Detail Dokumen
                                        </div>
                                        <div class="kt-wizard-v1__review-content">
                                            Judul Laporan: <span class="text-highlight">Complete Workstation (Monitor, Computer, Keyboard & Mouse)</span><br />
                                            File Laporan Microsoft Word: <span class="text-highlight">25kg</span><br />
                                            File Laporan PDF: <span class="text-highlight">110cm (w) x 90cm (h) x 150cm (L)</span>
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v1__review-item">
                                        <div class="kt-wizard-v1__review-title">
                                            Rangkuman Ulasan Perusahaan
                                        </div>
                                        <div class="kt-wizard-v1__review-content">
                                            Sangat Rendah <span class="text-highlight" id="jk_sangat_rendah">(0)</span><br />
                                            Rendah <span class="text-highlight" id="jk_rendah">(0)</span><br />
                                            Tinggi <span class="text-highlight" id="jk_tinggi">(0)</span><br />
                                            Sangat Tinggi <span class="text-highlight" id="jk_sangat_tinggi">(5)</span><br />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 4-->

                            <!--begin: Form Wizard Step 5-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--success">
                                        <input type="checkbox"> Saya setuju bahwa informasi yang diinputkan adalah benar tanpa rekayasa dan dapat dipertanggung jawabkan
                                        <span></span>
                                    </label>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 5-->

                            <!--begin: Form Actions -->
                            <div class="kt-form__actions">
                                <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                    Sebelumnya
                                </div>
                                <button id="btn-submit-dokumen-review" type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                    Submit
                                </button>
                                <div id="dokumen-btn-selanjutnya" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                    Selanjutnya
                                </div>
                            </div>

                            <!--end: Form Actions -->
                        </form>

                        <!--end: Form Wizard Form-->
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card radius-10">
            <div class="card-body">
                <div class="col-md-12 mb-4">
                    <label class="label-input">Upload Laporan</label>
                    <input type="file" class="form-control" />
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-danger">Upload</button>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@include('siswa.frame.footer')
<script>
    var dataQuery = {!! json_encode($data) !!}
</script>
<script src="{{ url('assets') }}/js/demo1/pages/wizard/wizard-1.js" type="text/javascript"></script>
<script src="{{ url('unggah_dokumen.js') }}" type="text/javascript"></script>