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
                        Tambah Akun Pembimbing Lapang
                    </h3>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.pembimbing-lapang.go.create') }}" class="kt-form">
                @csrf
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <h3 class="kt-section__title">1. Informasi Pembimbing Lapang:</h3>
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama:</label>
                                <div class="col-lg-8">
                                    <input required name="nama" type="text" class="form-control" placeholder="Tuliskan nama siswa disini" value="{{ old('nama') }}">
                                    <span class="form-text text-muted">Tuliskan nama siswa</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email:</label>
                                <div class="col-lg-8">
                                    <input required name="email" type="text" class="form-control" placeholder="Tuliskan email siswa disini" value="{{ old('email') }}">
                                    <span class="form-text text-muted">Tuliskan email siswa</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nomor Telepon:</label>
                                <div class="col-lg-8">
                                    <input required name="no_telpon" type="tel" class="form-control" placeholder="Tuliskan nomor telepon siswa disini" value="{{ old('no_telpon') }}">
                                    <span class="form-text text-muted">Tuliskan nomor telepon siswa</span>
                                </div>
                            </div>
                        </div>

                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                        <h3 class="kt-section__title">2. Password:</h3>
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Password:</label>
                                <div class="col-lg-6">
                                    <input required name="password" type="password" class="form-control" placeholder="Tuliskan password siswa disini" value="{{ old('password') }}">
                                    <span class="form-text text-muted">Tuliskan password siswa</span>
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
                                <button type="submit" class="btn btn-success">Buat Akun</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.frame.footer')