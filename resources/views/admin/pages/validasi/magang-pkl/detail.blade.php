@include('admin.frame.header')

<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h1 class="kt-portlet__head-title">
                        Detail {{ strtoupper($data['pengajuan']->nama_kegiatan) }} {{ $data['pengajuan']->nama }} 
                    </h1>
                   
                </div>
            </div>
            <div class="kt-portlet__body pt-0">
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Dibuat Pada {{ $data['pengajuan']->created_at }}</p>
                            </div>
                            <div class="col-md-12 mt-3">
                                <form method="POST" action="{{ route('admin.magang-pkl.go_update_pembimbing', ['id_pengajuan' => $data['pengajuan']->id]) }}">
                                    @csrf
                                    <label>Guru Pembimbing</label>
                                    <div class="input-group">
                                        <select name="id_guru_pembimbing" class="form-control">
                                            <option selected disabled>Pilih guru pembimbing ...</option>
                                            @for ($i = 0; $i < count($data['pembimbing']); $i++)
                                                <option value="{{ $data['pembimbing'][$i]->id }}">{{ $data['pembimbing'][$i]->nama }}</option>
                                            @endfor
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit">Perbarui</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ctm-footer-detail mt-4">
                        @if ($data['pengajuan']->status === 'diverifikasi')
                            <button type="button" disabled style="width: 100%; cursor: no-drop !important;" class="btn mr-3 btn-label-light btb-block btn-lg btn-upper text-black">Verifikasi</button>
                            <a href="{{ route('admin.magang-pkl.go_update_status', ['id_pengajuan' => $data['pengajuan']->id, 'tipe' => 'ditolak']) }}" style="width: 100%" class="btn btn-label-danger btn-lg btn-upper">Tolak</a>
                        @elseif ($data['pengajuan']->status === 'ditolak')
                            <a href="{{ route('admin.magang-pkl.go_update_status', ['id_pengajuan' => $data['pengajuan']->id, 'tipe' => 'diverifikasi']) }}" style="width: 100%" class="btn mr-3 btn-label-success btb-block btn-lg btn-upper">Verifikasi</a>
                            <button type="button" disabled style="width: 100%; cursor: no-drop !important;" class="btn mr-3 btn-label-light btb-block btn-lg btn-upper text-black">Tolak</button>
                        @else
                            <a href="{{ route('admin.magang-pkl.go_update_status', ['id_pengajuan' => $data['pengajuan']->id, 'tipe' => 'diverifikasi']) }}" style="width: 100%" class="btn mr-3 btn-label-success btb-block btn-lg btn-upper">Verifikasi</a>
                            <a href="{{ route('admin.magang-pkl.go_update_status', ['id_pengajuan' => $data['pengajuan']->id, 'tipe' => 'ditolak']) }}" style="width: 100%" class="btn btn-label-danger btn-lg btn-upper">Tolak</a>
                        @endif
                        
                    </div>
                </div>

                <!--end::Widget -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h1 class="kt-portlet__head-title">
                        Detail Siswa
                    </h1>
                </div>
            </div>
            <div class="kt-portlet__body pt-0">
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__body">
                        <div class="kt-widget__item">
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">NIS:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->nis }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Nama:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->nama }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Jurusan:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->nama_jurusan }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Email:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->email }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Nomor Telepon:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->siswa_no_telpon }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Jenis Kelamin:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->jenis_kelamin }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Tempat / Tanggal Lahir:</span>
                                <span href="#" class="kt-widget__data">{{ $data['pengajuan']->ttl }}</span>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <!--end::Widget -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
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
                                <h5 class="mb-3">Nama</h5>
                                <span class="kt-widget__data text-center">{{ $data['pengajuan']->nama_perusahaan }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Profile</h5>
                                <span class="kt-widget__data text-center">{{ $data['pengajuan']->profile_perusahaan }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Alamat</h5>
                                <span class="kt-widget__data text-center">{{ $data['pengajuan']->alamat_perusahaan }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Nomor Telepon</h5>
                                <span class="kt-widget__data text-center">{{ $data['pengajuan']->no_telp }}</span>
                            </div>
                            <div class="container-detail-pekerjaan mt-5">
                                <h5 class="mb-3">Deskripsi Pekerjaan</h5>
                                <span class="kt-widget__data text-center">{{ $data['pengajuan']->deskripsi_pekerjaan }}</span>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.frame.footer')