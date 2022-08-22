@include('admin.frame.header')

<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h1 class="kt-portlet__head-title">
                        Detail Perusahaan
                    </h1>
                </div>
            </div>
            <div class="kt-portlet__body pt-0">
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__body">
                        <div class="kt-widget__item">
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Diajukan Oleh</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->nama_siswa }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Nama Perusahaan</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->nama_perusahaan }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Profile Perusahaan</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->profile_perusahaan }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Alamat Perusahaan</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->alamat_perusahaan }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Nomor Telepon Perusahaan</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->no_telp }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Nama Pembimbing Lapangan</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->nama_pembimbing }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Deskripsi Pekerjaan</h5>
                                <span class="kt-widget__data text-center">{{ $data['perusahaan']->deskripsi_pekerjaan }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ctm-footer-detail mt-4">
                        @if ($data['perusahaan']->status === 'diverifikasi')
                            <button type="button" disabled style="width: 100%; cursor: no-drop !important;" class="btn mr-3 btn-label-light btb-block btn-lg btn-upper text-black">Verifikasi</button>
                            <a href="{{ route('admin.perusahaan.go_update_status', ['id_perusahaan' => $data['perusahaan']->id, 'tipe' => 'ditolak']) }}" style="width: 100%" class="btn btn-label-danger btn-lg btn-upper">Tolak</a>
                        @elseif ($data['perusahaan']->status === 'ditolak')
                            <a href="{{ route('admin.perusahaan.go_update_status', ['id_perusahaan' => $data['perusahaan']->id, 'tipe' => 'diverifikasi']) }}" style="width: 100%" class="btn mr-3 btn-label-success btb-block btn-lg btn-upper">Verifikasi</a>
                            <button type="button" disabled style="width: 100%; cursor: no-drop !important;" class="btn mr-3 btn-label-light btb-block btn-lg btn-upper text-black">Tolak</button>
                        @else
                            <a href="{{ route('admin.perusahaan.go_update_status', ['id_perusahaan' => $data['perusahaan']->id, 'tipe' => 'diverifikasi']) }}" style="width: 100%" class="btn mr-3 btn-label-success btb-block btn-lg btn-upper">Verifikasi</a>
                            <a href="{{ route('admin.perusahaan.go_update_status', ['id_perusahaan' => $data['perusahaan']->id, 'tipe' => 'ditolak']) }}" style="width: 100%" class="btn btn-label-danger btn-lg btn-upper">Tolak</a>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.frame.footer')