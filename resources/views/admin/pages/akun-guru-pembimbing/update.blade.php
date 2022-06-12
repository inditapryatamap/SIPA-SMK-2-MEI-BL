@include('admin.frame.header')

<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Perbarui Akun Guru Pembimbing
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.guru-pembimbing.go.update') }}" class="kt-form">
                @csrf
                <input name="id_guru_pembimbing" type="hidden" value="{{ $data['guru_pembimbing']->id }}">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <h3 class="kt-section__title">1. Informasi Guru Pembimbing:</h3>
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">NIS:</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control" readonly disabled placeholder="Tuliskan NIS siswa disini" value="{{ $data['guru_pembimbing']->nis }}">
                                    <span class="form-text text-muted">NIS siswa tidak dapat diubah</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama:</label>
                                <div class="col-lg-8">
                                    <input name="nama" type="text" class="form-control" placeholder="Tuliskan nama siswa disini" value="{{ $data['guru_pembimbing']->nama }}">
                                    <span class="form-text text-muted">Tuliskan nama siswa</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email:</label>
                                <div class="col-lg-8">
                                    <input name="email" type="text" class="form-control" placeholder="Tuliskan email siswa disini" value="{{ $data['guru_pembimbing']->email }}">
                                    <span class="form-text text-muted">Tuliskan email siswa</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nomor Telepon:</label>
                                <div class="col-lg-8">
                                    <input name="no_telpon" type="tel" class="form-control" placeholder="Tuliskan nomor telepon siswa disini" value="{{ $data['guru_pembimbing']->no_telpon }}">
                                    <span class="form-text text-muted">Tuliskan nomor telepon siswa</span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                        <h3 class="kt-section__title">2. Password:</h3>
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Password Baru:</label>
                                <div class="col-lg-6">
                                    <input name="password" type="password" class="form-control" placeholder="Tuliskan password baru siswa disini">
                                    <span class="form-text text-muted">Tuliskan password baru siswa. Kosongnkan jika tidak ingin memperbaruinya</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success">Perbarui</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
    </div>
</div>
@include('admin.frame.footer')