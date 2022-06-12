@include('siswa.frame.header')
<div class="row">
    <div class="col-md-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-black">Form Pengajuan Surat</h3>
                        <form method="POST" action="{{ route('surat.go_create_surat') }}">
                            @csrf
                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Nama</label>
                                    <input class="form-control" name="name" readonly value="{{ $data['siswa']->nama }}" />
                                </div>
                                {{-- <div class="col-md-6 mb-4">
                                    <label class="label-input">Jenis Kegiatan</label>
                                    <select class="form-control" name="jenis_kegiatan">
                                        <option value="pkl">Praktik Kerja Lapangan (PKL) 3 Bulan</option>
                                        <option value="magang">Magang 1 Bulan</option>
                                    </select>
                                </div> --}}
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">NIS</label>
                                    <input class="form-control" name="nis" readonly value="{{ $data['siswa']->nis }}"/>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Jurusan</label>
                                    <input class="form-control" name="id_jurusan" readonly value="{{ $data['siswa']->jurusan }}"/>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-input">Jenis Surat</label>
                                    <select class="form-control" name="id_jenis_surat">
                                        @for ($i = 0; $i < count($data['jenis_surat']); $i++)
                                            <option value="{{ $data['jenis_surat'][$i]->id }}">{{ $data['jenis_surat'][$i]->name }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">Keterangan</label>
                                    <textarea class="form-control" rows="5" name="keterangan">{{ old('keterangan') }}</textarea>
                                </div>
                                {{-- <div class="col-md-6 mb-4">
                                    <label class="label-input">Nama Perusahaan</label>
                                    <select class="form-control" name="id_perusahaan">
                                        @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                            <option value="{{ $data['perusahaan'][$i]->id }}">{{ $data['perusahaan'][$i]->nama_perusahaan }}</option>
                                        @endfor
                                    </select>
                                </div> --}}
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">Buat Pengajuan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>

@include('siswa.frame.footer')