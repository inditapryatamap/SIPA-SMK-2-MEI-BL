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
                            Detail dokumen
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Nama Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['dokumen']->nama_siswa }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">NIS Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['dokumen']->nis }}</span>
                                </div>
                            </div>
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Jenis Kegiatan</span>
                                    <span class="kt-widget12__value">{{ strtoupper($data['dokumen']->jenis_kegiatan) }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Perusahaan</span>
                                    <span class="kt-widget12__value">{{ $data['dokumen']->nama_perusahaan }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Judul Laporan : {{ $data['dokumen']->judul_laporan }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Laporan (.pdf)</span>
                                    <object style="width: 100%; height: 700px" data="{{ $data['dokumen']->file_laporan_pdf }}" type="application/pdf">
                                        <iframe src="https://docs.google.com/viewer?url={{ $data['dokumen']->file_laporan_pdf }}&embedded=true"></iframe>
                                    </object>
                                </div>
                            </div>
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Laporan (.doc)</span>
                                    {{-- <iframe src="https://docs.google.com/viewer?url={{ $data['dokumen']->file_laporan_ms_word }}&embedded=true"></iframe> --}}
                                    
                                    {{-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://fpik.ub.ac.id/wp-content/uploads/2020/11/Template-Skripsi-FPIK-2020.docx' width='100%' height='700px' frameborder='0'> --}}
                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ url('/') . $data['dokumen']->file_laporan_ms_word }}' width='100%' height='700px' frameborder='0'>
                                        This is an embedded 
                                        <a target='_blank' href='http://office.com'>Microsoft Office</a> 
                                        document, powered by 
                                        <a target='_blank' href='http://office.com/webapps'>Office Online</a>.
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.frame.footer')