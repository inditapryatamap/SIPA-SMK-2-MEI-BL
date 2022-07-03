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
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="ctx"></div>
                    <img src="{{ url('assets/images/slider/IMG_0100.JPG') }}" class="d-block w-100 fixed-size-banner image-overlay img-ctx" alt="...">
                    <div class="carousel-caption d-none d-md-block ctm" style="bottom: 29.25rem">
                        <img class="logo-banner" src="{{ url('logo.png') }}" />
                        <h1 class="title-banner">Maksimalkan Pengalaman Anda Dengan Mengikuti Kegiatan Praktik Kerja Lapangan (PKL)</h1>
                        <p>Dengan mengikuti kegiatan PKL ini, siswa/i diharapkan dapat meningkatkan keterampilan dan memperluas wawasan, serta dapat menerapkan ilmu-ilmu yang telah dipelajari di sekolah pada dunia kerja atau dunia usaha.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ctx"></div>
                    <img src="{{ url('assets/images/slider/IMG_8679.JPG') }}" class="d-block w-100 fixed-size-banner image-overlay img-ctx" alt="...">
                    <div class="carousel-caption d-none d-md-block ctm" style="bottom: 29.25rem">
                        <img class="logo-banner" src="{{ url('logo.png') }}" />
                        <h1 class="title-banner">Jurusan Teknik Instalasi Tenaga Listrik</h1>
                        <p>Teknik Instalasi Tenaga Listrik adalah jurusan yang mempelajari tentang perencanaan dan pemasangan instalasi penerangan, tenaga pemasangan dan pengoperasian motor listrik  dengan kendali elektromekanik, elektronik dan PLC (Programable Logic Controller). Merawat dan memperbaiki alat rumah tangga listrik dan teknik pendingin, serta menggulung ulang motor listrik.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ctx"></div>
                    <img src="{{ url('assets/images/slider/TP.jpg') }}" class="d-block w-100 fixed-size-banner image-overlay img-ctx" alt="...">
                    <div class="carousel-caption d-none d-md-block ctm" style="bottom: 29.25rem">
                        <img class="logo-banner" src="{{ url('logo.png') }}" />
                        <h1 class="title-banner">Jurusan Teknik Pemesinan</h1>
                        <p>Teknik Pemesinan adalah jurusan yang mempelajari tentang energi dan sumber energinya. Hal-hal yang dipelajari dalam teknik mesin banyak berurusan dengan penggerak-penggerak awal seperti turbin uap, motor bakar, mesin-mesin perkakas, pompa dan kompresor, pendingin dan pemanas dan alat-alat kimia tertentu.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ctx"></div>
                    <img src="{{ url('assets/images/slider/TKJ.jpg') }}" class="d-block w-100 fixed-size-banner image-overlay img-ctx" alt="...">
                    <div class="carousel-caption d-none d-md-block ctm" style="bottom: 29.25rem">
                        <img class="logo-banner" src="{{ url('logo.png') }}" />
                        <h1 class="title-banner">Jurusan Teknik Komputer dan Jaringan</h1>
                        <p>Teknik Komputer dan Jaringan merupakan ilmu berbasis Teknologi Informasi dan Komunikasi terkait kemampuan algoritma, dan pemrograman komputer, perakitan komputer, perakitan jaringan komputer, dan pengoperasian perangkat lunak, dan internet.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ctx"></div>
                    <img src="{{ url('assets/images/slider/IMG_8690.JPG') }}" class="d-block w-100 fixed-size-banner image-overlay img-ctx" alt="...">
                    <div class="carousel-caption d-none d-md-block ctm" style="bottom: 29.25rem">
                        <img class="logo-banner" src="{{ url('logo.png') }}" />
                        <h1 class="title-banner">Jurusan Teknik Audio Video</h1>
                        <p>Teknik Audio Video adalah kompetensi keahlian (atau umum disebut jurusan) yang akan membekali siswa dengan pengetahuan, sikap dan ketrampilan di bidang elektronika, khususnya dalam pengolahan sistem audio dan video.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="ctx"></div>
                    <img src="{{ url('assets/images/slider/TSM.jpg') }}" class="d-block w-100 fixed-size-banner image-overlay img-ctx" alt="...">
                    <div class="carousel-caption d-none d-md-block ctm" style="bottom: 29.25rem">
                        <img class="logo-banner" src="{{ url('logo.png') }}" />
                        <h1 class="title-banner">Jurusan Teknik Sepeda Motor</h1>
                        <p>Teknik dan Bisnis Sepeda Motor (TBSM) adalah salah satu cabang ilmu teknik mesin yang mempelajari tentang bagaimana merancang, membuat dan mengembangkan alat-alat transportasi darat yang menggunakan mesin, terutama sepeda motor. Teknik dan Bisnis Sepeda Motor (TBSM) menggabungkan elemen-elemen pengetahuan mekanika, listrik, elektronik, keselamatan dan lingkungan serta matematika, fisika, kimia, ipa dan manajemen.</p>
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
                    <img src="{{ url('assets/images/icon/1.png') }}" class="icon-image-landing mb-3"/>
                    <p>Membentuk pola pikir yang konstruktif</p>
                </div>
                <div class="side-d">
                    <img src="{{ url('assets/images/icon/2.png') }}" class="icon-image-landing mb-3"/>
                    <p>Melatih siswa untuk berkomunikasi secara profesional </p>
                </div>
                <div class="side-d">
                    <img src="{{ url('assets/images/icon/3.png') }}" class="icon-image-landing mb-3"/>
                    <p>Menambah  keterampilan, dan pengalaman siswa </p>
                </div>
                <div class="side-d">
                    <img src="{{ url('assets/images/icon/4.png') }}" class="icon-image-landing mb-3"/>
                    <p>Menjalin kerja sama yang baik antara sekolah dan perusahaan terkait </p>
                </div>
                <div class="side-d">
                    <img src="{{ url('assets/images/icon/5.png') }}" class="icon-image-landing mb-3"/>
                    <p>Mengenalkan siswa pada pekerjaan lapangan yang sebenarnya </p>
                </div>
                <div class="side-d">
                    <img src="{{ url('assets/images/icon/6.png') }}" class="icon-image-landing mb-3"/>
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
