@include('admin.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Perusahaan</button>
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Pengajuan Perusahaan
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__info">
                        Daftar perusahaan yang diajukan siswa
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Nomor Telepon Perusahaan</th>
                                        <th>Nama Pembimbing Lapang</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['perusahaan'][$i]->nama_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->alamat_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->no_telp }}</td>
                                            <td>{{ $data['perusahaan'][$i]->nama }}</td>
                                            <td>
                                                @if ($data['perusahaan'][$i]->status === 'diverifikasi')
                                                    <span class="badge badge-success">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @elseif ($data['perusahaan'][$i]->status === 'ditolak')
                                                    <span class="badge badge-danger">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @else
                                                    <span class="badge badge-info">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.perusahaan.detail', ['id_perusahaan' => $data['perusahaan'][$i]->id]) }}" class="btn btn-success">Detail</a></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['perusahaan']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.perusahaan.go_create_perusahaan') }}" class="kt-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Kegiatan</label>
                            <select name="id_pembimbing_lapang" class="form-control">
                                @for ($i = 0; $i < count($data['guru_pembimbing']); $i++)
                                    <option value="{{ $data['guru_pembimbing'][$i]->id }}">{{ $data['guru_pembimbing'][$i]->nama }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Nama Perusahaan</label>
                            <input name="nama_perusahaan" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Profile Perusahaan</label>
                            <textarea name="profile_perusahaan" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Alamat Perusahaan</label>
                            <textarea name="alamat_perusahaan" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="label-input">No Telepon</label>
                            <input name="no_telp" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Deskripsi Pekerjaan</label>
                            <textarea name="deskripsi_pekerjaan" class="form-control" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Buat Perusahaan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.frame.footer')

