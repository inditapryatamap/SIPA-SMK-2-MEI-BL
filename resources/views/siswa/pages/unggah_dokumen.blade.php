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

                        <form method="POST" action="{{ route('go_create_dokumen_review') }}" class="kt-form" enctype="multipart/form-data">
                            @csrf
                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('siswa.frame.footer')
<script>
    var dataQuery = {!! json_encode($data) !!}
</script>
<script src="{{ url('assets') }}/js/demo1/pages/wizard/wizard-1.js" type="text/javascript"></script>
<script src="{{ url('unggah_dokumen.js') }}" type="text/javascript"></script>