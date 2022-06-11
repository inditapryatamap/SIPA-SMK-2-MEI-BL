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
                        Daftar Siswa
                    </h3>
                    
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('admin.guru-pembimbing.create') }}" class="nav-link active text-black" >Tambah Akun</a>
                        </li>
                    </ul>
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
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['guru_pembimbing']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['guru_pembimbing'][$i]->nis }}</td>
                                            <td>{{ $data['guru_pembimbing'][$i]->nama }}</td>
                                            <td>{{ $data['guru_pembimbing'][$i]->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.guru-pembimbing.update', ['id_guru_pembimbing' => $data['guru_pembimbing'][$i]->id]) }}" class="btn btn-primary">Perbarui</a>
                                                <a href="{{ route('admin.guru-pembimbing.go.delete', ['id_guru_pembimbing' => $data['guru_pembimbing'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['guru_pembimbing']->links('pagination::bootstrap-5') }}
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