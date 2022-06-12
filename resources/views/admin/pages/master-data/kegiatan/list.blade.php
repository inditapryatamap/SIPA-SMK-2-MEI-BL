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
                        Daftar Jurusan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#md_create">Tambah Jurusan</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Jurusan yang terdaftar di sistem. Jurusan digunakan untuk dikaitkan dengan akun siswa. Setiap siswa wajib memiliki satu jurusan
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jurusan</th>
                                        <th>Dibuat Pada</th>
                                        <th>Diperbarui Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['jurusan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['jurusan'][$i]->nama_jurusan }}</td>
                                            <td>{{ $data['jurusan'][$i]->created_at }}</td>
                                            <td>{{ $data['jurusan'][$i]->updated_at }}</td>
                                            <td class="text-center">
                                                <button onclick="onClickUpdate({{ $data['jurusan'][$i] }})" type="button" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.master-data.jurusan.go.delete', ['id_jurusan' => $data['jurusan'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['jurusan']->links('pagination::bootstrap-5') }}
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
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.jurusan.go.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input name="nama_jurusan" value="{{ old('nama_jurusan') }}" type="text" class="form-control" placeholder="tuliskan nama jurusan baru disini ...">
                        <span class="form-text text-muted">Tulsikan nama jurusan</span>
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
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.jurusan.go.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input name="id_jurusan" id="ed_id_jurusan" type="hidden">
                        <input name="nama_jurusan" id="ed_nama_jurusan" type="text" class="form-control" placeholder="tuliskan nama jurusan baru disini ...">
                        <span class="form-text text-muted">Tulsikan nama jurusan</span>
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
        $('#ed_nama_jurusan').val(data.nama_jurusan);
        $('#ed_id_jurusan').val(data.id);
    }
</script>

@include('admin.frame.footer')