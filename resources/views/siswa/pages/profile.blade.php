@include('siswa.frame.header')
<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-lg-12 mb-3">
        <div class="card radius-10">
            <div class="card-body">
                <h4 class="text-black font-bold">Profile</h4>
                <p class="text-black mb-0">Informasi Data Diri</p>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('siswa.go_update_profile') }}" class="">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Jurusan</label>
                    <select class="form-control" name="id_jurusan" id="">
                        @for ($i = 0; $i < count($data['jurusan']); $i++)
                            @if ($data['profile']->id_jurusan === $data['jurusan'][$i]->id)
                                <option selected value={{ $data['jurusan'][$i]->id }}>{{ $data['jurusan'][$i]->nama_jurusan }}</option>
                            @else
                                <option value={{ $data['jurusan'][$i]->id }}>{{ $data['jurusan'][$i]->nama_jurusan }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $data['profile']->nama }}" class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label>NIS</label>
                    <input type="number" readonly name="nis" value="{{ $data['profile']->nis }}" class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $data['profile']->email }}" class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label>TTL</label>
                    <input type="text" name="ttl" value="{{ $data['profile']->ttl }}" class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_telpon" value="{{ $data['profile']->no_telpon }}" class="form-control"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@include('siswa.frame.footer')