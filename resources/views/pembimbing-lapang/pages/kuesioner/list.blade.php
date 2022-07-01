@include('pembimbing-lapang.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    @if (!isset($data['jawaban']))
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Kuesioner
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form method="POST" action="{{ route('pembimbing-lapang.kuesioner.go_save_kuesioner') }}" class="">
                        @csrf
                        <?php $incrementHelper = 0; ?>
                        @for ($i = 0; $i < count($data['kuesioner']); $i++)
                        
                            <div class="kt-section">
                                <div class="kt-section__info">
                                    {{ $data['kuesioner'][$i]->pertanyaan }}
                                </div>

                                @if ($data['kuesioner'][$i]->type === 'choice')
                                    <input type="hidden" name="jawaban[{{ $incrementHelper }}][type]" value="{{ $data['kuesioner'][$i]->type }}" />
                                    <input type="hidden" name="jawaban[{{ $incrementHelper }}][id]" value="{{ $data['kuesioner'][$i]->id }}" />
                                    <div class="kt-section__content">
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--bold">
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="true" type="radio"> Ya
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--bold">
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="false" type="radio"> Tidak
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                @elseif($data['kuesioner'][$i]->type === 'range')
                                    <div class="kt-section__content">
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio kt-radio--bold">
                                                <input type="hidden" name="jawaban[{{ $incrementHelper }}][type]" value="{{ $data['kuesioner'][$i]->type }}" />
                                                <input type="hidden" name="jawaban[{{ $incrementHelper }}][id]" value="{{ $data['kuesioner'][$i]->id }}" />
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="1" type="radio"> 1
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--bold">
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="2" type="radio"> 2
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--bold">
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="3" type="radio"> 3
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--bold">
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="4" type="radio"> 4
                                                <span></span>
                                            </label>
                                            <label class="kt-radio kt-radio--bold">
                                                <input name="jawaban[{{ $incrementHelper }}][value]-{{ $data['kuesioner'][$i]->id }}" value="5" type="radio"> 5
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                @elseif($data['kuesioner'][$i]->type === 'select')
                                    <div class="kt-section__content">
                                        <div class="kt-checkbox-list">
                                            @for ($k = 0; $k < count($data['kuesioner'][$i]->option); $k++)
                                                <label class="kt-checkbox">
                                                    <input type="hidden" name="jawaban[{{ $incrementHelper }}][type]" value="{{ $data['kuesioner'][$i]->type }}" />
                                                    <input type="hidden" name="jawaban[{{ $incrementHelper }}][id]" value="{{ $data['kuesioner'][$i]->id }}" />
                                                    <input name="jawaban[{{ $incrementHelper }}][option][]" type="checkbox" value="{{ $data['kuesioner'][$i]->option[$k]->option }}"> {{ $data['kuesioner'][$i]->option[$k]->option }}
                                                    <span></span>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <?php $incrementHelper++ ?>
                        @endfor
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
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
                                    @if ($data['kuesioner'][$i]->jawaban === '1')
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
        </div>
    @endif
</div>
@include('pembimbing-lapang.frame.footer')