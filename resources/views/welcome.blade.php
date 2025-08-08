<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERUMDAL PAL Banjarmasin</title>
    <style>
        .modal .form-group label {
            text-align: left !important;
            display: block;
        }

        .hero-banner-six {
            position: relative;
            padding-bottom: 20px;
            text-align: center;
        }

        .hero-banner-six h1,
        .hero-banner-six p {
            position: relative;
            z-index: 2;
            /* Pastikan teks selalu di depan */
        }

        .banner-image {
            text-align: center;
            margin-top: 20px;
            /* jarak antara teks dan gambar */
        }

        .banner-image img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            object-fit: contain;
            /* pastikan gambar tidak terpotong */
        }
    </style>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="" class="navbar-brand">
                    <img src="{{ asset('vendor/adminlte/dist/img/logo.jpg') }}" alt="" width="250">
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="d-block d-lg-none">
                            <div class="logo">
                                {{-- <a href="/" class="d-block"><img
                                        src="{{ asset('vendor/adminlte/dist/img/logo.jpg') }}" alt=""
                                        width="200">
                                </a> --}}
                            </div>
                        {{-- </li>
                        <li class="nav-item"><a href="#kodeetik" class="nav-link">Kode Etik</a>
                        </li> --}}
                        {{-- <li class="nav-item"><a href="#faq" class="nav-link">Pertanyaan</a>
                        </li>
                        <li class="nav-item"><a href="#kegiatan" class="nav-link">Kegiatan</a>
                        </li> --}}
                    </ul>
                </div>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary ">Log in</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div id="home" class="hero-banner-six position-relative md-pt-10 pt-100">
                <div class="container text-center">
                    <h1 class="hero-heading fw-light tx-dark">
                        Sanitasi yang baik dapat mencegah <br><b class="position-relative">STUNTING</b>
                    </h1>
                    <p class="text-lg mb-75 pt-60 lg-mb-40 lg-pt-40">
                        Kami berkomitmen untuk memberikan pelayanan terbaik dalam pengelolaan limbah domestik <br> untuk
                        sanitasi yang lebih baik di Kota
                        <a href="https://perumdapaldbanjarmasin.com">Banjarmasin</a>
                    </p>
                    <div class="d-flex justify-content-center">
                        <div class="mr-4">
                            <x-semua.aduan />
                        </div>
                        <div>
                            <x-kritiksaran />
                        </div>
                    </div>

                </div>
                <!-- Banner image -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 text-center">
                            <div class="banner-image">
                                <img src="{{ asset('vendor/adminlte/dist/img/banner.jpg') }}" alt="Banner"
                                    class="img-fluid">
                            </div><br><br>
                            <h3 style="text-align:left">Kode Etik PERUMDA PALD Banjarmasin</h3>

                            <ol style="text-align:left">
                                <li>Disiplin dengan jam kerja dan berpakaian dinas.</li>
                                <li>Memberikan pelayanan secara cepat, sopan, ramah dan simpatik.</li>
                                <li>Tegas tidak memberikan ruang terhadap praktek KKN.</li>
                                <li>Terbuka dan jujur dalam memberikan informasi tentang materi, data dan proses pelayanan
                                    yang jelas dan benar.</li>
                                <li>Patuh dan memberikan pelayanan sesuai Standar Pelayanan dan SOP untuk memenuhi tingkat
                                    kepuasan pengguna layanan.</li>
                                <li>Teladan dan memberikan contoh yang baik kepada rekan kerja maupun pengguna jasa layanan.</li>
                                <li>Bertanggung jawab dalam menjalankan tugas sesuai dengan ketentuan perundang-undangan
                                    yang berlaku.</li>
                                <li>Objektif, adil dan tidak diskriminatis dengan cara memberikan kesempatan yang sama
                                    terhadap pengguna layanan.</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @yield('content') {{-- ✅ sekarang ini akan menampilkan konten anak --}}
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
    @include('sweetalert::alert')
</body>

</html>

