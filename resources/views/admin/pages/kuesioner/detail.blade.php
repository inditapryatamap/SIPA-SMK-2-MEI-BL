@include('admin.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    @if ($data['jawaban'] === null)
        <div class="col-lg-12">
            @include('not-found')
        </div>
    @else
        <div class="col-lg-12">
            @for ($i = 0; $i < count($data['jawaban']); $i++)
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Kuesioner {{ (int)$i + 1 }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <div class="kt-section__info">
                                {{ $data['jawaban'][$i]->pertanyaan }}
                            </div>

                            @if ($data['jawaban'][$i]->type === 'choice')
                                <div class="kt-section__content">
                                    <div class="kt-radio-inline">
                                        @if ($data['jawaban'][$i]->jawaban === 'true')
                                            <b>Iya</b>
                                        @else
                                            <b>Tidak</b>
                                        @endif
                                    </div>
                                </div>
                            @elseif($data['jawaban'][$i]->type === 'range')
                                <div class="kt-section__content">
                                    @if ($data['jawaban'][$i]->jawaban === '1')
                                        <b>Sangat Kurang</b>
                                    @elseif ($data['jawaban'][$i]->jawaban === '2')
                                        <b>Kurang</b>
                                    @elseif ($data['jawaban'][$i]->jawaban === '3')
                                        <b>Cukup</b>
                                    @elseif ($data['jawaban'][$i]->jawaban === '4')
                                        <b>Baik</b>
                                    @elseif ($data['jawaban'][$i]->jawaban === '5')
                                        <b>Sangat Baik</b>
                                    @endif
                                </div>
                            @elseif($data['jawaban'][$i]->type === 'select')
                                <div class="kt-section__content">
                                    <ul class="">
                                        @for ($k = 0; $k < count($data['jawaban'][$i]->option); $k++)
                                            <li>{{ $data['jawaban'][$i]->option[$k]->option }}</li>
                                        @endfor
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endfor
            <a href="{{ route('riwayat.kuesioner.go_delete_kuesioner') }}" class="btn btn-danger">Hapus dan Buat Ulang Kuesioner</a>
        </div>
    @endif
</div>
@include('admin.frame.footer')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>