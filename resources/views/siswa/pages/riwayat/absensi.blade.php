@include('siswa.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12 mb-3">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="text-black font-bold">Absensi</h4>
                <p class="text-black mb-3">Daftar hadir untuk kegiatan yang sedang berjalan</p>
                <form method="GET" action="{{ route('riwayat.absensi.list') }}">
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
    @if (!empty($data['absensi']))
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('riwayat.absensi.go_create') }}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_magang_pkl" value="{{ $data['current_magang_pkl']->id }}" />
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Tanggal Absensi</label>
                            <input type="text" value="{{ date("Y/m/d") }}" readonly name="tanggal" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Status Absensi</label>
                            <select class="form-control" name="absensi">
                                <option value="h">Hadir</option>
                                <option value="i">Izin</option>
                                <option value="s">Sakit</option>
                                <option value="a">Tanpa Keterangan</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-info">Isi Absensi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <p class="mb-0">Riwayat Absensi</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Status Absensi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($data['absensi']); $i++)
                                <tr>
                                    <th scope="row">{{ (int)$i + 1 }}</th>
                                    <td>{{ $data['current_magang_pkl']->nama_siswa }}</td>
                                    <td>{{ $data['current_magang_pkl']->nama_perusahaan }}</td>
                                    <td>{{ $data['absensi'][$i]->tanggal }}</td>
                                    <td>{{ $data['absensi'][$i]->absensi }}</td>
                                    <td>{{ $data['absensi'][$i]->status }}</td>
                                    <td><button class="btn btn-info">Edit</button></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    
</div>
@include('siswa.frame.footer')