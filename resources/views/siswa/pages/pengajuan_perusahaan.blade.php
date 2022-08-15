@include('siswa.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12 mb-3">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="text-black font-bold">Pengajuan Pendaftaran Perusahaan</h4>
                <p class="text-black mb-0">Alur Pendaftaran Perusahaan</p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-black">Form Pengajuan Perusahaan</h3>
                        <form method="POST" action="{{ route('go_create_perusahaan') }}">
                            @csrf
                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Nama Perusahaan</label>
                                    <input name="nama_perusahaan" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Alamat Perusahaan</label>
                                    <input name="alamat_perusahaan" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Nama Pembimbing Lapang</label>
                                    <input name="nama_pembimbing_lapang" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Email Perusahaan</label>
                                    <input name="email_pembimbing_lapang" class="form-control" />
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">No. Telp Perusahaan.</label>
                                    <input name="no_telp" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Profil Perusahaan</label>
                                    <textarea name="profile_perusahaan" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Deskripsi Pekerjaan</label>
                                    <textarea name="deskripsi_pekerjaan" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">Ajukan</button>
                                    <button type="reset" class="btn btn-danger">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0">Riwayat Pengajuan PKL/Magang</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>No Telp</th>
                                        <th>Porfil Perusahaan</th>
                                        <th>Deskripsi Pekerjaan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['perusahaan'][$i]->nama_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->alamat_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->no_telp }}</td>
                                            <td>{{ $data['perusahaan'][$i]->profile_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->deskripsi_pekerjaan }}</td>
                                            <td>
                                                @if ($data['perusahaan'][$i]->status === 'diverifikasi')
                                                    <span class="badge badge-success">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @elseif ($data['perusahaan'][$i]->status === 'ditolak')
                                                    <span class="badge badge-danger">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @else
                                                    <span class="badge badge-info">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @endif
                                            </td>
                                            <td><button class="btn btn-danger">Hapus</button></td>
                                        </tr>
                                    @endfor
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                Pengumuman
            </div>
        </div>
    </div> --}}
</div>
@include('siswa.frame.footer')