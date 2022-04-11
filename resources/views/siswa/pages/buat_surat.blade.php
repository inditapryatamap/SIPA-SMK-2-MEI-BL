@include('siswa.frame.header')
<div class="row">
    <div class="col-lg-12 text-right">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#kt_modal_6">Buat Surat</button>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="mb-5">Riwayat Pengajuan Surat Keterangan</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jenis Surat</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Table cell</td>
                                <td>Table cell</td>
                                <td>Table cell</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pengajuan Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="label-input">NIS</label>
                        <input class="form-control" />
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="label-input">Nama</label>
                        <input class="form-control" />
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="label-input">Jenis Surat</label>
                        <select class="form-control">
                            <option>Surat Izin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-primary">Ajukan</button>
            </div>
        </div>
    </div>
</div>

@include('siswa.frame.footer')