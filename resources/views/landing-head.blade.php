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
    <div class="resc bg-main head-landing">
        <div class="resc-d">
            <div class="ct-logo-nav-d">
                <img alt="Logo" style="width: 15%;" src="{{ url('logo-landing.png') }}" />
            </div>
        </div>
        <div class="resc-d text-right landing-nav-right">
            <div class="container-menu-landing">
                <a href={{ route('/') }}>Home</a>
                <a href={{ route('contact') }}>Contact</a>
                <a href={{ route('faq') }}>Faq</a>
                <div class="dropdown">
                    <button class="btn btn-primary circle-btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                      Masuk
                    </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item text-black" href="{{ route('admin.login') }}">Login Admin</a></li>
                            <li><a class="dropdown-item text-black" href="{{ route('pembimbing-lapang.login') }}">Login Pembimbing Lapang</a></li>
                            <li><a class="dropdown-item text-black" href="{{ route('guru-pembimbing.login') }}">Login Guru Pembimbing</a></li>
                            <li><a class="dropdown-item text-black" href="{{ route('siswa.login') }}">Login Siswa</a></li>
                        </ul>
                  </div>
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