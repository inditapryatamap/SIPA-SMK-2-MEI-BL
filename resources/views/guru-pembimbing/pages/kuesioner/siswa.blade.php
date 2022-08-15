@include('guru-pembimbing.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            @if (count($data['user']) > 0)
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Daftar kuesioner yang telah dibuat siswa
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['user']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['user'][$i]->nis }}</td>
                                            <td>{{ $data['user'][$i]->nama_siswa }}</td>
                                            <td>{{ $data['user'][$i]->nama_kegiatan }} - {{ $data['user'][$i]->durasi }} hari</td>
                                            <td>{{ $data['user'][$i]->nama_perusahaan }}</td>
                                            <td><a href="{{ route('guru-pembimbing.kuesioner.detail', ['tipe' => 'siswa', 'id_user' => $data['user'][$i]->id]) }}" class="btn btn-success">Kuesioner</a></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['user']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            @else
                @include('not-found')
            @endif
        </div>
    </div>
</div>
@include('guru-pembimbing.frame.footer')