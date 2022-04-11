@include('siswa.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('siswa.frame.flash')
    </div>
    <div class="col-lg-12 mb-3">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="text-black font-bold">Pengajuan Pendaftaran Pelaksanaan Magang atau PKL</h4>
                <p class="text-black mb-0">Alur Pendaftaran Magang atau PKL</p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-black">Form Pengajuan Pelaksanaan Magang/PKL</h3>
                        <form method="POST" action="{{ route('go_create_pkl_magang') }}">
                            @csrf
                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Nama</label>
                                    <input class="form-control" disabled readonly value="{{ $data['siswa']->nama }}" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">NIS</label>
                                    <input class="form-control" disabled readonly value="{{ $data['siswa']->nis }}"/>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Jurusan</label>
                                    <input class="form-control" disabled readonly value="{{ $data['siswa']->jurusan }}"/>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">No. Telp.</label>
                                    <input class="form-control" disabled readonly value="{{ $data['siswa']->no_telpon }}"/>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Jenis Kegiatan</label>
                                    <select class="form-control" name="jenis_kegiatan">
                                        <option value="pkl">Praktik Kerja Lapangan (PKL) 3 Bulan</option>
                                        <option value="magang">Magang 1 Bulan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Perusahaan</label>
                                    <select class="form-control" name="id_perusahaan">
                                        @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                            <option value="{{ $data['perusahaan'][$i]->id }}">{{ $data['perusahaan'][$i]->nama_perusahaan }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">Buat Pengajuan</button>
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
                                        <th>Jenis Kegiatan</th>
                                        <th>Perusahaan</th>
                                        <th>Pembimbing</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['magang_pkl']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['magang_pkl'][$i]->jenis_kegiatan }}</td>
                                            <td>{{ $data['magang_pkl'][$i]->nama_perusahaan }}</td>
                                            <td>{{ $data['magang_pkl'][$i]->nama_pembimbing }}</td>
                                            <td>{{ $data['magang_pkl'][$i]->status }}</td>
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                Pengumuman
            </div>
        </div>
    </div>
</div>
@include('siswa.frame.footer')