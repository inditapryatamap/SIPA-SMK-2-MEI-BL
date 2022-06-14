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
                        Aspek Penilaian Surat Keterangan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#md_create">Tambah Aspek Penilaian Surat Keterangan</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Surat Keterangan yang dilakukan pada perusahaan. Aspek Penilaian Surat Keterangan digunakan untuk dikaitkan dengan penilaian terhadap siswa yang berada di jurusan tertentu.
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aspek Penilaian</th>
                                        <th>Dibuat Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['surat-keterangan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['surat-keterangan'][$i]->aspek_penilaian }}</td>
                                            <td>{{ $data['surat-keterangan'][$i]->created_at }}</td>
                                            <td class="text-center">
                                                <button onclick="onClickUpdate({{ $data['surat-keterangan'][$i] }})" type="button" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.penilaian.surat-keterangan.go.delete', ['id_kepribadian' => $data['surat-keterangan'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['surat-keterangan']->links('pagination::bootstrap-5') }}
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
            <form class="kt-form" method="POST" action="{{ route('admin.penilaian.surat-keterangan.go.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Aspek Penilaian Surat Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Aspek Penilaian Surat Keterangan</label>
                        <input name="aspek_penilaian" value="{{ old('kompetensi') }}" type="text" class="form-control" placeholder="Tuliskan Aspek Penilaian Surat Keterangan baru disini ...">
                        <span class="form-text text-muted">Tuliskan Aspek Penilaian Surat Keterangan</span>
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
            <form class="kt-form" method="POST" action="{{ route('admin.penilaian.surat-keterangan.go.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Aspek Penilaian Surat Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ed_id" name="id_kepribadian"/>
                    <div class="form-group">
                        <label>Aspek Penilaian Surat Keterangan</label>
                        <input name="aspek_penilaian" id="ed_aspek_penilaian" type="text" class="form-control" placeholder="Tuliskan Aspek Penilaian Surat Keterangan baru disini ...">
                        <span class="form-text text-muted">Tuliskan Aspek Penilaian Surat Keterangan</span>
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
        
        $('#ed_id').val(data.id);
        $('#ed_aspek_penilaian').val(data.aspek_penilaian);
    }
</script>

@include('admin.frame.footer')