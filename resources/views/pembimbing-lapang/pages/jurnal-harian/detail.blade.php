@include('pembimbing-lapang.frame.header')

<style>
    .kt-timeline-v3 .kt-timeline-v3__item:before {
        position: absolute;
        display: block;
        width: 0.28rem;
        border-radius: 0.3rem;
        height: 70%;
        left: 9.100000000000001rem;
        top: 0.46rem;
        content: "";
    }
</style>

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
                            Informasi Kegiatan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Nama Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nama_siswa }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">NIS Siswa</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nis }}</span>
                                </div>
                            </div>
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Jenis Kegiatan</span>
                                    <span class="kt-widget12__value">{{ strtoupper($data['magang-pkl']->jenis_kegiatan) }}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Perusahaan</span>
                                    <span class="kt-widget12__value">{{ $data['magang-pkl']->nama_perusahaan }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Jurnal Harian
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget3_tab1_content">

                        <!--Begin::Timeline 3 -->
                        <div class="kt-timeline-v3">
                            <div class="kt-timeline-v3__items">
                                
                                @for ($i = 0; $i < count($data['jurnal-harian']); $i++)
                                    <div class="row border-bottom mb-2">
                                        <div class="col-md-8">
                                            <div class="kt-timeline-v3__item kt-timeline-v3__item--success">
                                                <span class="kt-timeline-v3__item-time" style="width: 7.6rem">{{ $data['jurnal-harian'][$i]->tanggal }}</span>
                                                <div class="kt-timeline-v3__item-desc" style="padding-left: 11rem">
                                                    <span class="kt-timeline-v3__item-text">
                                                        {{ $data['jurnal-harian'][$i]->kegiatan }}
                                                    </span><br>
                                                    <span class="kt-timeline-v3__item-user-name mr-1 label-jurnal-detail">
                                                        
                                                        <span class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                            Guru :
                                                        </span>
                                                    </span>
                                                    <span class="kt-timeline-v3__item-user-name mr-3">
                                                        @if ($data['jurnal-harian'][$i]->status_guru_pembimbing == 1)
                                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-success font-bold">
                                                                Divalidasi
                                                            </span>
                                                        @elseif ($data['jurnal-harian'][$i]->status_guru_pembimbing == 2)
                                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-danger font-bold">
                                                                Tidak Divalidasi
                                                            </span>
                                                        @else
                                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link font-bold">
                                                                Belum Divalidasi
                                                            </span>
                                                        @endif
                                                        
                                                    </span>
                                                    <span class="kt-timeline-v3__item-user-name mr-1 label-jurnal-detail">
                                                        
                                                        <span class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                            Lapang :
                                                        </span>
                                                    </span>
                                                    <span class="kt-timeline-v3__item-user-name">
                                                        @if ($data['jurnal-harian'][$i]->status_pembimbing_lapang == 1)
                                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-success font-bold">
                                                                Divalidasi
                                                            </span>
                                                        @elseif ($data['jurnal-harian'][$i]->status_pembimbing_lapang == 2)
                                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link text-danger font-bold">
                                                                Tidak Divalidasi
                                                            </span>
                                                        @else
                                                            <span class="kt-link kt-link--dark kt-timeline-v3__itek-link font-bold">
                                                                Belum Divalidasi
                                                            </span>
                                                        @endif
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="centered-action-jurnal">
                                                <a href="{{ route('pembimbing-lapang.jurnal-harian.go_validasi', ['id_jurnal_harian' => $data['jurnal-harian'][$i]->id, 'tipe' => 1]) }}" class="btn btn-success btn-icon mr-2"><i class="fa fa-check"></i></a>
                                                <a href="{{ route('pembimbing-lapang.jurnal-harian.go_validasi', ['id_jurnal_harian' => $data['jurnal-harian'][$i]->id, 'tipe' => 2]) }}" class="btn btn-danger btn-icon"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <!--End::Timeline 3 -->
                    </div>
                    <div class="tab-pane" id="kt_widget3_tab2_content">

                        <!--Begin::Timeline 3 -->
                        <div class="kt-timeline-v3">
                            <div class="kt-timeline-v3__items">
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                    <span class="kt-timeline-v3__item-time kt-font-success">09:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Bob
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">
                                    <span class="kt-timeline-v3__item-time kt-font-warning">10:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            There are many variations of passages of Lorem Ipsum available.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Sean
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--brand">
                                    <span class="kt-timeline-v3__item-time kt-font-primary">11:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By James
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--success">
                                    <span class="kt-timeline-v3__item-time kt-font-success">12:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By James
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--danger">
                                    <span class="kt-timeline-v3__item-time kt-font-warning">14:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Latin words, combined with a handful of model sentence structures.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Derrick
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                    <span class="kt-timeline-v3__item-time kt-font-info">15:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Iman
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--brand">
                                    <span class="kt-timeline-v3__item-time kt-font-danger">17:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem Ipsum is therefore always free from repetition, injected humour.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Aziko
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End::Timeline 3 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pembimbing-lapang.frame.footer')