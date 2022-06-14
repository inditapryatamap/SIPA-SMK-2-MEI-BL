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
                        Kompetensi Jenis Kegiatan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#md_create">Tambah Kompetensi Jenis Kegiatan</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Kompetensi Jenis Kegiatan yang dilakukan pada perusahaan. Aspek Penilaian Jenis Kegiatan digunakan untuk dikaitkan dengan penilaian terhadap siswa yang berada di jurusan tertentu.
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jurusan</th>
                                        <th>Kompetensi</th>
                                        <th>Dibuat Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['jenis-kegiatan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['jenis-kegiatan'][$i]->nama_jurusan }}</td>
                                            <td>{{ $data['jenis-kegiatan'][$i]->kompetensi }}</td>
                                            <td>{{ $data['jenis-kegiatan'][$i]->created_at }}</td>
                                            <td class="text-center">
                                                <button onclick="onClickUpdate({{ $data['jenis-kegiatan'][$i] }})" type="button" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.penilaian.jenis-kegiatan.go.delete', ['id_jenis_kegiatan' => $data['jenis-kegiatan'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['jenis-kegiatan']->links('pagination::bootstrap-5') }}
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
            <form class="kt-form" method="POST" action="{{ route('admin.penilaian.jenis-kegiatan.go.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kompetensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="id_jurusan">
                            @for ($i = 0; $i < count($data['jurusan']); $i++)
                                <option value="{{ $data['jurusan'][$i]->id }}">{{ $data['jurusan'][$i]->nama_jurusan }}</option>
                            @endfor
                        </select>
                        <span class="form-text text-muted">Pilih jurusan untuk kompetensi ini</span>
                    </div>
                    <div class="form-group">
                        <label>Nama Kompetensi</label>
                        <input name="kompetensi" value="{{ old('kompetensi') }}" type="text" class="form-control" placeholder="tuliskan kompetensi baru disini ...">
                        <span class="form-text text-muted">Tuliskan kompetensi</span>
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
            <form class="kt-form" method="POST" action="{{ route('admin.penilaian.jenis-kegiatan.go.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Kompetensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ed_id" name="id_jenis_kegiatan"/>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="id_jurusan" id="generateListJurusan">
                            {{-- @for ($i = 0; $i < count($data['jurusan']); $i++)
                                <option value="{{ $data['jurusan'][$i]->id }}">{{ $data['jurusan'][$i]->nama_jurusan }}</option>
                            @endfor --}}
                        </select>
                        <span class="form-text text-muted">Pilih jurusan untuk kompetensi ini</span>
                    </div>
                    <div class="form-group">
                        <label>Kompetensi</label>
                        <input name="kompetensi" id="ed_kompetensi" type="text" class="form-control" placeholder="tuliskan kompetensi baru disini ...">
                        <span class="form-text text-muted">Tuliskan kompetensi</span>
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
    var jurusan = {!! json_encode($data['jurusan']) !!};
    function onClickUpdate(data) {
        $('#md_update').modal('show');
        
        $('#ed_id').val(data.id);
        $('#ed_kompetensi').val(data.kompetensi);

        let html = '';
        for (let i = 0; i < jurusan.length; i++) {
            if (data.id_jurusan === jurusan[i].id) {
                html += '<option selected value='+ jurusan[i].id +'>'+ jurusan[i].nama_jurusan +'</option>'
            } else {
                html += '<option value='+ jurusan[i].id +'>'+ jurusan[i].nama_jurusan +'</option>'
            }
        }

        $('#generateListJurusan').html(html);
    }
</script>

@include('admin.frame.footer')