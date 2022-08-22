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
                        Daftar Pembimbing Lapangan
                    </h3>
                    
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('admin.pembimbing-lapang.create') }}" class="nav-link active text-black" >Tambah Akun</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pembimbing-lapang.export') }}" class="nav-link active text-black" >Export Data</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__info">
                        Pembimbing Lapangan yang terdaftar di sistem
                    </div>
                    <div class="kt-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Siswa</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($data['pembimbing_lapang']); $i++)
                                        <tr>
                                            <th scope="row">{{ (int)$i + 1 }}</th>
                                            <td>{{ $data['pembimbing_lapang'][$i]->nama }}</td>
                                            <td>{{ $data['pembimbing_lapang'][$i]->email }}</td>
                                            <td>{{ $data['pembimbing_lapang'][$i]->no_telpon }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.pembimbing-lapang.update', ['id_pembimbing_lapang' => $data['pembimbing_lapang'][$i]->id]) }}" class="btn btn-primary">Perbarui</a>
                                                <a href="{{ route('admin.pembimbing-lapang.go.delete', ['id_pembimbing_lapang' => $data['pembimbing_lapang'][$i]->id]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $data['pembimbing_lapang']->links('pagination::bootstrap-5') }}
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