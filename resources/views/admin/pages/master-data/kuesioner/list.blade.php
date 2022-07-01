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
                        Daftar Kuesioner
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#md_create">Tambah Kuesioner</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Kuesioner yang terdaftar di sistem. Kuesioner digunakan untuk feedback dari kegiatan yang akan dikalkulasi pada dashboard.
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kuesioner</th>
                                        <th>Untuk</th>
                                        <th>Tipe</th>
                                        <th>Dibuat Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['kuesioner']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['kuesioner'][$i]->pertanyaan }}</td>
                                            <td>{{ $data['kuesioner'][$i]->for }}</td>
                                            <td>{{ $data['kuesioner'][$i]->type }}</td>
                                            <td>{{ $data['kuesioner'][$i]->created_at }}</td>
                                            <td class="text-center">
                                                <button onclick="onClickUpdate({{ $data['kuesioner'][$i] }})" type="button" class="btn btn-primary">Perbarui</button>
                                                <a href="{{ route('admin.master-data.kuesioner.go.delete', ['id_jenis_surat' => $data['kuesioner'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['kuesioner']->links('pagination::bootstrap-5') }}
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
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.kuesioner.go.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kuesioner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input name="pertanyaan" value="{{ old('pertanyaan') }}" type="text" class="form-control" placeholder="tuliskan pertanyaan baru disini ...">
                        <span class="form-text text-muted">Tuliskan pertanyaan</span>
                    </div>
                    <div class="form-group">
                        <label>Untuk</label>
                        <select name="for" class="form-control">
                            <option value="siswa">Siswa</option>
                            <option value="lapang">Pembimbing Lapang</option>
                        </select>
                        <span class="form-text text-muted">Pilih user untuk kuesioner ini</span>
                    </div>
                    <div class="form-group">
                        <label>Tipe Jawaban</label>
                        <select name="type" onchange="handleChangeTipeJawaban(this)" name="for" id="tipe-jawaban-create" class="form-control">
                            <option value="range">Range</option>
                            <option value="choice">Choice</option>
                            <option value="select">Select</option>
                        </select>
                        <span class="form-text text-muted">Pilih tipe jawaban untuk kuesioner ini</span>
                    </div>
                    <div class="form-group type_open">
                        <label class="type-select-open">Jawaban Tipe (Select)</label>
                        <div class="das type-select-open" id="generateInput">
                            
                        </div>
                        <button id="#type_open" type="button" onclick="onTambahJawaban()" class="btn btn-info mt-1 type-select-open">Tambah jawaban</button>
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
            <form class="kt-form" method="POST" action="{{ route('admin.master-data.kuesioner.go.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Jenis Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input name="id_kuesioner" id="ed_id_kuesioner" type="hidden">
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input name="pertanyaan" id="ed_pertanyaan" type="text" class="form-control" placeholder="tuliskan pertanyaan baru disini ...">
                        <span class="form-text text-muted">Tuliskan pertanyaan</span>
                    </div>
                    <div class="form-group">
                        <label>Untuk</label>
                        <select name="for" id="ed_untuk" class="form-control">
                            <option value="siswa">Siswa</option>
                            <option value="lapang">Pembimbing Lapang</option>
                        </select>
                        <span class="form-text text-muted">Pilih user untuk kuesioner ini</span>
                    </div>
                    <div class="form-group">
                        <label>Tipe Jawaban</label>
                        <select name="type" id="ed_type" onchange="handleChangeTipeJawaban(this)" name="for" id="tipe-jawaban-create" class="form-control">
                            <option value="range">Range</option>
                            <option value="choice">Choice</option>
                            <option value="select">Select</option>
                        </select>
                        <span class="form-text text-muted">Pilih tipe jawaban untuk kuesioner ini</span>
                    </div>
                    <div class="form-group type_open">
                        <label class="type-select-open">Jawaban Tipe (Select)</label>
                        <div class="das type-select-open" id="generateInputUpdate">
                            
                        </div>
                        <button id="#type_open" type="button" onclick="onTambahJawabanUpdate()" class="btn btn-info mt-1 type-select-open">Tambah jawaban</button>
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



@include('admin.frame.footer')

<script>
    $('.type_open').hide()

    function onClickUpdate(data) {

        $('#md_update').modal('show');
        
        $('#ed_id_kuesioner').val(data.id);
        $('#ed_pertanyaan').val(data.pertanyaan);
        $("#ed_untuk").val(data.for).change();
        $("#ed_type").val(data.type).change();

        if (data.type !== 'select') {
            $('.type_open').hide()
        }
        
        var html = ''
        for (let i = 0; i < data.option.length; i++) {
           html += '<input value='+ data.option[i].option +' name="option[]" type="text" class="mb-2 form-control" placeholder="tuliskan jawaban">'
        }
        $('#generateInputUpdate').html(html);
    }
    var htmlInput = ''
    function handleChangeTipeJawaban(params) {
        if (params.value === 'select') {
            $('.type_open').show()

            
            htmlInput = '<input name="option[]" type="text" class="mb-2 form-control" placeholder="tuliskan jawaban">';
            $('#generateInput').html(htmlInput);
            $('#generateInputUpdate').html(htmlInput);
        } else {
            $('.type_open').hide()
        }
        $('#tipe-jawaban-create').val()
    }

    function onTambahJawaban() {
        htmlInput += '<input name="option[]" type="text" class="mb-2 form-control" placeholder="tuliskan jawaban">';
        $('#generateInput').html(htmlInput);
    }

    function onTambahJawabanUpdate() {
        htmlInput += '<input name="option[]" type="text" class="mb-2 form-control" placeholder="tuliskan jawaban">';
        $('#generateInputUpdate').html(htmlInput);
    }
    
</script>