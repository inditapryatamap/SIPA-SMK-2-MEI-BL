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
                        Daftar Jurusan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('admin.master-data.jurusan.create') }}" class="nav-link active text-black" >Tambah Akun</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Jurusan yang terdaftar di sistem
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jurusan</th>
                                        <th>Dibuat Pada</th>
                                        <th>Diperbarui Pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['jurusan']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['jurusan'][$i]->nama_jurusan }}</td>
                                            <td>{{ $data['jurusan'][$i]->created_at }}</td>
                                            <td>{{ $data['jurusan'][$i]->updated_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.master-data.jurusan.update', ['id_siswa' => $data['jurusan'][$i]->id]) }}" class="btn btn-primary">Perbarui</a>
                                                <a href="{{ route('admin.master-data.jurusan.go.delete', ['id_siswa' => $data['jurusan'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['jurusan']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.frame.footer')