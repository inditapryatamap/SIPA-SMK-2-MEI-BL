@include('admin.frame.header')

<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Detail Surat
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        @if ($data['surat']->status === 'diverifikasi')
                            <span class="badge badge-success">{{ strtoupper($data['surat']->status) }}</span>
                        @elseif ($data['surat']->status === 'ditolak')
                            <span class="badge badge-danger">{{ strtoupper($data['surat']->status) }}</span>
                        @else
                            <span class="badge badge-info">{{ strtoupper($data['surat']->status) }}</span>
                        @endif
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Jenis Surat</span>
                                    <span class="kt-widget12__value">{{ $data['surat']->jenis_surat_nama }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Deskripsi Surat</span>
                                    <span class="kt-widget12__value">{{ $data['surat']->jenis_surat_description }}</span>
                                </div>
                            </div>
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Nama Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['surat']->nama_siswa }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">NIS Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['surat']->nis }}</span>
                                </div>
                            </div>
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Tanggal Diajukan</span>
                                    <span class="kt-widget12__value">{{ $data['surat']->created_at }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Keterangan Tambahan</span>
                                    <span class="kt-widget12__value">{{ $data['surat']->keterangan }}</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__footer">
                    <div class="kt-portlet__body">
                        <div class="kt-widget12__item">
                            <div class="kt-widget12__info">
                                <form method="POST" action="{{ route('admin.surat.go_update_file', ['id_surat' => $data['surat']->id]) }}" enctype='multipart/form-data'>
                                    @csrf
                                    <span class="kt-widget12__desc">File : <a target="_blank" rel="noreferrer" href="{{ $data['surat']->file }}">{{ substr($data['surat']->file, strrpos($data['surat']->file, '/') + 1) }}</a></span>
                                    <input name="file_data" type="file" class="form-control" />
                                    <button type="submit" class="btn btn-success mt-3">Perbarui Surat</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.frame.footer')