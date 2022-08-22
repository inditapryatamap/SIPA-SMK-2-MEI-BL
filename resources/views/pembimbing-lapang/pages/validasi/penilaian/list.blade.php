@include('pembimbing-lapang.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            @if (count($data['magang-pkl']) > 0)
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Daftar Siswa Magang / PKL
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Siswa yang terdaftar di sistem
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Perusahaan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['magang-pkl']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['magang-pkl'][$i]->nis }}</td>
                                            <td>{{ $data['magang-pkl'][$i]->nama }}</td>
                                            <td>{{ $data['magang-pkl'][$i]->nama_jurusan }}</td>
                                            <td>{{ strtoupper($data['magang-pkl'][$i]->nama_kegiatan) }}</td>
                                            <td>{{ $data['magang-pkl'][$i]->nama_perusahaan }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('pembimbing-lapang.validasi.penilaian.detail', ['id_pengajuan' => $data['magang-pkl'][$i]->id]) }}" class="btn btn-primary">Penilaian</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['magang-pkl']->links('pagination::bootstrap-5') }}
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
@include('pembimbing-lapang.frame.footer')