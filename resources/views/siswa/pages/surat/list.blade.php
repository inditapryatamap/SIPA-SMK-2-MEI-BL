@include('siswa.frame.header')
<div class="row">
    <div class="col-md-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Pengajuan Surat <small>Alur Pengajuan Surat</small>
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Preview-->
                <div class="kt-demo">
                    <div class="kt-demo__preview">
                        <div class="kt-list-timeline">
                            <div class="kt-list-timeline__items">
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                    <span class="kt-list-timeline__text">Anda wajib memperhatikan ketentuan Pengajuan Surat Keterangan</span>
                                    <span class="kt-list-timeline__time">Langkah 1</span>
                                </div>
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--danger"></span>
                                    <span class="kt-list-timeline__text">Pengajuan Surat Keterangan hanya dapat dilakukan oleh siswa/i yang melaksanakan PKL/Magang</span>
                                    <span class="kt-list-timeline__time">Langkah 2</span>
                                </div>
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--warning"></span>
                                    <span class="kt-list-timeline__text">Untuk pengajuan Surat Pengantar PKL/Magang hanya dapat dilakukan satu kali, yaitu ketika sedang pelaksanaan kegiatan PKL/Magang</span>
                                    <span class="kt-list-timeline__time">Langkah 3</span>
                                </div>
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--primary"></span>
                                    <span class="kt-list-timeline__text">Untuk pengajuan Surat Dispen hanya dapat dilakukan apabila sedang mengikuti kegiatan mendesak, seperti lomba, sakit, atau ujian</span>
                                    <span class="kt-list-timeline__time">Langkah 4</span>
                                </div>
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--brand"></span>
                                    <span class="kt-list-timeline__text">Untuk melakukan pengajuan surat, silahkan tekan tombol Buat Pengajuan </span>
                                    <span class="kt-list-timeline__time">Langkah 5</span>
                                </div>
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                    <span class="kt-list-timeline__text">Isilah data-data yang diperlukan dengan benar agar mempermudah proses pembuatan surat</span>
                                    <span class="kt-list-timeline__time">Langkah 6</span>
                                </div>
                                <div class="kt-list-timeline__item">
                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--danger"></span>
                                    <span class="kt-list-timeline__text">Apabila surat telah selasi diproses, silahkan tekan tombol Download</span>
                                    <span class="kt-list-timeline__time">Langkah 7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-4 text-right">
        <a href="{{ route('surat.create') }}" class="btn btn-primary">Buat Pengajuan</a>
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
                                <th>Nama Siswa</th>
                                <th>Jenis Surat</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($data['surat']); $i++)
                                <tr>
                                    <th scope="row">{{ (int)$i + 1 }}</th>
                                    <td>{{ $data['surat'][$i]->nama_siswa }}</td>
                                    <td>{{ $data['surat'][$i]->nama_surat }}</td>
                                    <td>{{ $data['surat'][$i]->keterangan }}</td>
                                    <td>
                                        @if ($data['surat'][$i]->status === 'diverifikasi')
                                            <span class="badge badge-success">{{ strtoupper($data['surat'][$i]->status) }}</span>
                                        @elseif ($data['surat'][$i]->status === 'ditolak')
                                            <span class="badge badge-danger">{{ strtoupper($data['surat'][$i]->status) }}</span>
                                        @else
                                            <span class="badge badge-info">{{ strtoupper($data['surat'][$i]->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data['surat'][$i]->file !== null)
                                            <a class="btn btn-success" target="_blank" rel="noreferrer" href="{{ $data['surat'][$i]->file }}">Donwload</a>
                                        @else
                                            <span class="badge badge-danger">Belum Dibuat</span>
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    {{ $data['surat']->links("pagination::bootstrap-4") }}
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