@include('siswa.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12 mb-3">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="text-black font-bold">Jurnal Harian</h4>
                <p class="text-black mb-3">Evaluasi kegiatan yang sedang dilakukan</p>
                <form method="GET" action="{{ route('riwayat.jurnal.list') }}">
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
    @if (!empty($data['jurnal']))
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('riwayat.jurnal.go_create') }}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_magang_pkl" value="{{ $data['current_magang_pkl']->id }}" />
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="label-input">Kegiatan</label>
                            <textarea rows="5" name="kegiatan" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-info">Isi Jurnal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <p class="mb-0">Riwayat Jurnal Harian</p>
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
                                <th>Kegiatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($data['jurnal']); $i++)
                                <tr>
                                    <th scope="row">{{ (int)$i + 1 }}</th>
                                    <td>{{ $data['current_magang_pkl']->nama_siswa }}</td>
                                    <td>{{ $data['current_magang_pkl']->nama_perusahaan }}</td>
                                    <td>{{ $data['jurnal'][$i]->tanggal }}</td>
                                    <td>{{ $data['jurnal'][$i]->kegiatan }}</td>
                                    <td>{{ $data['jurnal'][$i]->status }}</td>
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