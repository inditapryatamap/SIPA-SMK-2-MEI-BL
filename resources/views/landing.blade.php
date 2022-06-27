<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ url('landing.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="row bg-main head-landing">
        <div class="col-md-6">
            {{-- <img alt="Logo" style="width: 50%;" src="{{ url('assets') }}/media/logos/logo-dark-sipa.png" /> --}}
        </div>
        <div class="col-md-6 text-right landing-nav-right">
            <div class="container-menu-landing">
                <a href="">Home</a>
                <a href="">Contact</a>
                <a href="">Faq</a>
                <a class="btn btn-primary circle-btn" href="">Masuk</a>
            </div>
        </div>
    </div>
    <div class="banner">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://foto.data.kemdikbud.go.id/getImage/10807072/17.jpg"
                        class="d-block w-100 fixed-size-banner" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Maksimalkan Pengalaman Anda Dengan Mengikuti Kegiatan
                            Praktik Kerja Lapangan (PKL)</h5>
                        <p>Dengan mengikuti kegiatan PKL ini, siswa/i diharapkan dapat meningkatkan keterampilan
                            dan memperluas wawasan, serta dapat menerapkan ilmu-ilmu yang telah dipelajari di sekolah
                            pada dunia kerja atau dunia usaha.
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://foto.data.kemdikbud.go.id/getImage/10807072/17.jpg"
                        class="d-block w-100 fixed-size-banner" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Maksimalkan Pengalaman Anda Dengan Mengikuti Kegiatan
                            Praktik Kerja Lapangan (PKL)</h5>
                        <p>Dengan mengikuti kegiatan PKL ini, siswa/i diharapkan dapat meningkatkan keterampilan
                            dan memperluas wawasan, serta dapat menerapkan ilmu-ilmu yang telah dipelajari di sekolah
                            pada dunia kerja atau dunia usaha.
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://foto.data.kemdikbud.go.id/getImage/10807072/17.jpg"
                        class="d-block w-100 fixed-size-banner" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Maksimalkan Pengalaman Anda Dengan Mengikuti Kegiatan
                            Praktik Kerja Lapangan (PKL)</h5>
                        <p>Dengan mengikuti kegiatan PKL ini, siswa/i diharapkan dapat meningkatkan keterampilan
                            dan memperluas wawasan, serta dapat menerapkan ilmu-ilmu yang telah dipelajari di sekolah
                            pada dunia kerja atau dunia usaha.
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="content">
        <div class="title-landing text-center mt-5">
            <h2 class="title-ldn">Mengapa Harus Mengikuti Kegiatan PKL?</h2>
        </div>
        <div class="tools">
            <div class="container-side-d">
                <div class="side-d">
                    <i class="fa-solid fa-head-side-medical"></i>
                    <p>Membentuk pola pikir yang konstruktif</p>
                </div>
                <div class="side-d">
                    <i class="fa-solid fa-head-side-medical"></i>
                    <p>Melatih siswa untuk berkomunikasi secara profesional </p>
                </div>
                <div class="side-d">
                    <i class="fa-solid fa-head-side-medical"></i>
                    <p>Menambah  keterampilan, dan pengalaman siswa </p>
                </div>
                <div class="side-d">
                    <i class="fa-solid fa-head-side-medical"></i>
                    <p>Menjalin kerja sama yang baik antara sekolah dan perusahaan terkait </p>
                </div>
                <div class="side-d">
                    <i class="fa-solid fa-head-side-medical"></i>
                    <p>Mengenalkan siswa pada pekerjaan lapangan yang sebenarnya </p>
                </div>
                <div class="side-d">
                    <i class="fa-solid fa-head-side-medical"></i>
                    <p>Mempersiapkan sumber daya manusia berkualitas </p>
                </div>
            </div>
        </div>
        <div class="title-landing text-center mt-5">
            <h2 class="title-ldn">Partnership</h2>
        </div>
        <div class="partnership text-center">
            <div class="ct-partnership">
                <img src="{{ url('assets/images/partnership/yamaha.png') }}" />
            </div>
            <div class="ct-partnership">
                <img src="{{ url('assets/images/partnership/daihatsu.png') }}" />
            </div>
            <div class="ct-partnership">
                <img src="{{ url('assets/images/partnership/auto2000.png') }}" />
            </div>
            <div class="ct-partnership">
                <img src="{{ url('assets/images/partnership/tunasdaihatsu.png') }}" />
            </div>
            <div class="ct-partnership">
                <img src="{{ url('assets/images/partnership/honda.png') }}" />
            </div>
            <div class="ct-partnership">
                <img src="{{ url('assets/images/partnership/mitsubishi.png') }}" />
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-md-4">
                <img class="logo-footer" src="{{ url('logo-landing.png') }}" />
                <p class="afww">Website untuk tempat pengajuan PKL (Praktik Kerja Lapangan) </p>
            </div>
            <div class="col-md-4">
                <h4 class="text-title-footer">Alamat</h4>
                <p class="afww">Jl. Abdul Muis No.18, Gedong Meneng, 
                    Kec. Rajabasa, Kota Bandar Lampung, 
                    Lampung 35145
                </p>
            </div>
            <div class="col-md-4">
                <h4 class="text-title-footer">Kontak</h4>
                <p class="afww mb-0 mt-1">Catur Ahmad Novriadi : 0812-3344-5566</p>
                <p class="afww mb-0 mt-1">Muhammad Tarmizi : 0812-3344-5566</p>
                <p class="afww mb-0 mt-1">Muhammad Wahyudi : 0812-3344-5566</p>
            </div>
            <div class="col-md-12 text-center mt-4">
                <h2 class="text-white">Stay Connected With Us</h2>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.login') }}">Admin</a>
    <a href="{{ route('siswa.login') }}">Siswa</a>
    <a href="{{ route('guru-pembimbing.login') }}">Guru Pembimbing</a>
    <a href="{{ route('pembimbing-lapang.login') }}">Pembimbing Lapang</a>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://your-site-or-cdn.com/fontawesome/v6.1.1/js/all.js" data-auto-replace-svg="nest"></script>

</html>
