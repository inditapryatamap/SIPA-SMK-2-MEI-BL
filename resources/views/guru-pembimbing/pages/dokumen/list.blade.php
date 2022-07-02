@include('guru-pembimbing.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Daftar Dokumen Laporan Kegiatan
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__info">
                        Daftar siswa yang sudah mengumpulkan laporan kegiatan
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Judul Laporan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['dokumen']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['dokumen'][$i]->nis }}</td>
                                            <td>{{ $data['dokumen'][$i]->nama_siswa }}</td>
                                            <td>{{ $data['dokumen'][$i]->nama_kegiatan }} - {{ $data['dokumen'][$i]->durasi }} hari</td>
                                            <td>{{ $data['dokumen'][$i]->nama_perusahaan }}</td>
                                            <td>{{ $data['dokumen'][$i]->judul_laporan }}</td>
                                            <td><a href="{{ route('guru-pembimbing.dokumen.detail', ['id_dokumen' => $data['dokumen'][$i]->id]) }}" class="btn btn-success">Detail</a></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['dokumen']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                <!--end::Section-->
            </div>

            <!--end::Form-->
        </div>
    </div>
</div>
@include('guru-pembimbing.frame.footer')