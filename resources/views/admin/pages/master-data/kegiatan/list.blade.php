@include('admin.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Daftar Kegiatan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#md_create">Tambah Kegiatan</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Kegiatan yang terdaftar di sistem. Kegiatan digunakan untuk dikaitkan dengan pengajuan kegiatan yang dilakukan oleh siswa.
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kegiatan</th>
                                        <th>Durasi</th>
                                        <th>Keterangan</th>
                                        <th>Dibuat Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['kegiatan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['kegiatan'][$i]->nama_kegiatan }}</td>
                                            <td>{{ $data['kegiatan'][$i]->durasi }} Hari</td>
                                            <td>{{ $data['kegiatan'][$i]->keterangan }}</td>
                                            <td>{{ $data['kegiatan'][$i]->created_at }}</td>
                                            <td class="text-center">
                                                <button onclick="onClickUpdate({{ $data['kegiatan'][$i] }})" type="button" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.master-data.kegiatan.go.delete', ['id_jurusan' => $data['kegiatan'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['kegiatan']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_create" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.kegiatan.go.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" type="text" class="form-control" placeholder="tuliskan nama kegiatan baru disini ...">
                        <span class="form-text text-muted">Tuliskan nama kegiatan</span>
                    </div>
                    <div class="form-group">
                        <label>Durasi Kegiatan</label>
                        <input name="durasi" value="{{ old('durasi') }}" type="number" class="form-control" placeholder="tuliskan durasi kegiatan baru disini ...">
                        <span class="form-text text-muted">Tuliskan durasi kegiatan. Durasi kegiatan dalam hitungan Hari</span>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea rows="5" name="keterangan" class="form-control" placeholder="tuliskan keterangan disini ...">{{ old('durasi') }}</textarea>
                        <span class="form-text text-muted">Tuliskan durasi kegiatan. Durasi kegiatan dalam hitungan Hari</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="md_update" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.kegiatan.go.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input name="id_jurusan" id="ed_id_jurusan" type="hidden">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input name="nama_kegiatan" id="ed_nama_kegiatan" type="text" class="form-control" placeholder="tuliskan nama kegiatan baru disini ...">
                        <span class="form-text text-muted">Tuliskan nama kegiatan</span>
                    </div>
                    <div class="form-group">
                        <label>Durasi Kegiatan</label>
                        <input name="durasi" id="ed_durasi" type="number" class="form-control" placeholder="tuliskan durasi kegiatan baru disini ...">
                        <span class="form-text text-muted">Tuliskan durasi kegiatan. Durasi kegiatan dalam hitungan Hari</span>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea rows="5" id="ed_keterangan" name="keterangan" class="form-control" placeholder="tuliskan keterangan disini ..."></textarea>
                        <span class="form-text text-muted">Tuliskan durasi kegiatan. Durasi kegiatan dalam hitungan Hari</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function onClickUpdate(data) {
        $('#md_update').modal('show');
        
        $('#ed_id_jurusan').val(data.id);
        $('#ed_nama_kegiatan').val(data.nama_kegiatan);
        $('#ed_durasi').val(data.durasi);
        $('#ed_keterangan').val(data.keterangan);
    }
</script>

@include('admin.frame.footer')