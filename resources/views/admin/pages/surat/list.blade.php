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
                        Pengajuan Surat
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__info">
                        Daftar siswa yang mengajukan pembuatan Surat
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Surat</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['surat']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['surat'][$i]->jenis_surat }}</td>
                                            <td>{{ $data['surat'][$i]->nis }}</td>
                                            <td>{{ $data['surat'][$i]->nama_siswa }}</td>
                                            <td>
                                                @if ($data['surat'][$i]->file !== null)
                                                    <a target="_blank" rel="noreferrer" href="{{ $data['surat'][$i]->file }}">{{ substr($data['surat'][$i]->file, strrpos($data['surat'][$i]->file, '/') + 1) }}</a>
                                                @else
                                                    <span class="badge badge-danger">Belum Dibuat</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data['surat'][$i]->status === 'diverifikasi')
                                                    <span class="badge badge-success">{{ strtoupper($data['surat'][$i]->status) }}</span>
                                                @elseif ($data['surat'][$i]->status === 'ditolak')
                                                    <span class="badge badge-danger">{{ strtoupper($data['surat'][$i]->status) }}</span>
                                                @else
                                                    <span class="badge badge-info">{{ strtoupper($data['surat'][$i]->status) }}</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.surat.detail', ['id_surat' => $data['surat'][$i]->id]) }}" class="btn btn-success">Detail</a></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['surat']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                <!--end::Section-->
            </div>

            <!--end::Form-->
        </div>
    </div>
</div>
@include('admin.frame.footer')