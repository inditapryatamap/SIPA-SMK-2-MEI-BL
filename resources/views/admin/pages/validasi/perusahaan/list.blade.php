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
                        Pengajuan Perusahaan
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__info">
                        Daftar perusahaan yang diajukan siswa
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Nomor Telepon Perusahaan</th>
                                        <th>Nama Pembimbing Lapang</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['perusahaan'][$i]->nama_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->alamat_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->no_telp }}</td>
                                            <td>{{ $data['perusahaan'][$i]->nama }}</td>
                                            <td>
                                                @if ($data['perusahaan'][$i]->status === 'diverifikasi')
                                                    <span class="badge badge-success">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @elseif ($data['perusahaan'][$i]->status === 'ditolak')
                                                    <span class="badge badge-danger">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @else
                                                    <span class="badge badge-info">{{ strtoupper($data['perusahaan'][$i]->status) }}</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.perusahaan.detail', ['id_perusahaan' => $data['perusahaan'][$i]->id]) }}" class="btn btn-success">Detail</a></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['perusahaan']->links('pagination::bootstrap-5') }}
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