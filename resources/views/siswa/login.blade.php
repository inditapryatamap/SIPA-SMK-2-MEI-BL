@include('landing-head')
<div class="container-landing-form">
    <div class="row">
        <div class="col-md-7">
            <div class="ct-landing-form">
                <img src="{{ url('logo-landing.png') }}" class="logo-landing-form" />
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="ct-landing-form-2">
                <h3 style="margin-top: 100px;" class="text-center text-white">Sistem Informasi <br>Pelaksanaan Akademik</h3>
                <h3 style="margin-top: 100px" class="text-white mb-4">Login</h3>
                <form class="btn-login-mags" method="POST" action="{{ route('siswa.go_login') }}">
                    @csrf
                    @include('flash')
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-white">NIS</label>
                        <input type="text" name="nis" value="{{ old('nis') }}" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-white">Password</label>
                        <input type="password" value="{{ old('password') }}" name="password" class="form-control">
                    </div>
                    <div class="mb-4 text-right">
                        <a class="text-white" href="{{ route('forgot_password') }}">Lupa Password ?</a>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3 d-grid gap-2 mt-5 ">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@include('landing-footer')