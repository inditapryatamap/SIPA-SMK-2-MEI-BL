@include('landing-head')
    <div class="container m-5">
        @include('flash')
        <form action="{{ route('go_forgot_password') }}" method="POST">
            @csrf
            <h3>Lupa Password</h3>
            <small>Kami akan mengirimkan email untuk mereset password akun anda</small>
            <div class="mb-3 border-top pt-3 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3 border-top pt-3 mt-3">
                <label for="role" class="form-label">Tipe Akun</label>
                <select name="role" id="role" class="form-control">
                    <option value="siswa">Siswa</option>
                    <option value="guru_pembimbing">Guru Pembimbing</option>
                    <option value="pembimbing_perusahaan">Pembimbing Perusahaan</option>
                </select>
            </div>
            <button class="btn btn-primary">Kirim</button>
        </form>
    </div>
    @include('landing-footer')