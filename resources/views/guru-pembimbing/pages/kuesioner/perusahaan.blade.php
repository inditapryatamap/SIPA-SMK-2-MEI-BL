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
                                        <th>Perusahaan</th>
                                        <th>Pembimbing Lapang</th>
                                        <th>Jenis Kegiatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['perusahaan'][$i]->nama_perusahaan }}</td>
                                            <td>{{ $data['perusahaan'][$i]->nama }}</td>
                                            <td>{{ $data['perusahaan'][$i]->nama_kegiatan }} - {{ $data['perusahaan'][$i]->durasi }} hari</td>
                                            <td><a href="{{ route('guru-pembimbing.kuesioner.detail', ['tipe' => 'lapang', 'id_user' => $data['perusahaan'][$i]->id_pembimbing_lapang]) }}" class="btn btn-success">Kuesioner</a></td>
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
@include('guru-pembimbing.frame.footer')