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
                        Daftar Jenis Surat
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#md_create">Tambah Jenis Surat</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Jenis Surat yang terdaftar di sistem. Jenis Surat digunakan untuk pilihan surat yang dapat diajukan oleh siswa.
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Surat</th>
                                        <th>Keterangan</th>
                                        <th>Dibuat Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['jenis-surat']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['jenis-surat'][$i]->name }}</td>
                                            <td>{{ $data['jenis-surat'][$i]->description }}</td>
                                            <td>{{ $data['jenis-surat'][$i]->created_at }}</td>
                                            <td class="text-center">
                                                <button onclick="onClickUpdate({{ $data['jenis-surat'][$i] }})" type="button" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.master-data.jenis-surat.go.delete', ['id_jenis_surat' => $data['jenis-surat'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['jenis-surat']->links('pagination::bootstrap-5') }}
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
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.jenis-surat.go.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jenis Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Jenis Surat</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="tuliskan nama jenis surat baru disini ...">
                        <span class="form-text text-muted">Tuliskan nama jenis surat</span>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea rows="5" name="description" class="form-control" placeholder="tuliskan keterangan disini ...">{{ old('description') }}</textarea>
                        <span class="form-text text-muted">Tuliskan keterangan jenis surat. Durasi jenis-surat dalam hitungan Hari</span>
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
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.jenis-surat.go.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Jenis Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input name="id_jenis_surat" id="ed_id_jenis_surat" type="hidden">
                    <div class="form-group">
                        <label>Jenis Surat</label>
                        <input name="name" id="ed_name" type="text" class="form-control" placeholder="tuliskan jenis surat baru disini ...">
                        <span class="form-text text-muted">Tuliskan jenis surat</span>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea rows="5" id="ed_description" name="description" class="form-control" placeholder="tuliskan keterangan disini ..."></textarea>
                        <span class="form-text text-muted">Tuliskan keterangan</span>
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
        
        $('#ed_id_jenis_surat').val(data.id);
        $('#ed_name').val(data.name);
        $('#ed_description').val(data.description);
    }
</script>

@include('admin.frame.footer')