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
                                <th>Validasi Guru Pembimbing</th>
                                <th>Validasi Pembimbing Lapang</th>
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
                                    <td>
                                        @if ($data['jurnal'][$i]->status_guru_pembimbing == 1)
                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-success font-bold">
                                                Divalidasi
                                            </span>
                                        @elseif ($data['jurnal'][$i]->status_guru_pembimbing == 2)
                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-danger font-bold">
                                                Tidak Divalidasi
                                            </span>
                                        @else
                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link font-bold">
                                                Belum Divalidasi
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data['jurnal'][$i]->status_pembimbing_lapang == 1)
                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-success font-bold">
                                                Divalidasi
                                            </span>
                                        @elseif ($data['jurnal'][$i]->status_pembimbing_lapang == 2)
                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-danger font-bold">
                                                Tidak Divalidasi
                                            </span>
                                        @else
                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link font-bold">
                                                Belum Divalidasi
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data['jurnal'][$i]->status_pembimbing_lapang == 0 && $data['jurnal'][$i]->status_guru_pembimbing == 0)
                                        <button onclick="handleClickKegiatan({{ $data['jurnal'][$i] }})" class="btn btn-info">Edit</button>
                                        @endif
                                        
                                    </td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('riwayat.jurnal.go_update') }}" class="kt-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <input type="hidden" id="id_kegiatan" name="id_kegiatan" class="form-control" />
                            <label class="label-input">Kegiatan</label>
                            <input id="kegiatan" name="kegiatan" class="form-control" />
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Ubah Kegiatan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('siswa.frame.footer')

<script>
    function handleClickKegiatan(params) {
        console.log('params', params)
        $('#exampleModal').modal('show')
        $('#kegiatan').val(params.kegiatan)
        $('#id_kegiatan').val(params.id)
        
    }
</script>