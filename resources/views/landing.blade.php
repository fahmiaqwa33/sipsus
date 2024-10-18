<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - SISPUS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SISPUS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Pelayanan">Pelayanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Kontak">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="home-section home-full-height bg-dark bg-gradient" id="home" data-background="assets/images/section-10.jpg">
        <div class="titan-caption">
            <div class="caption-content">
                <div class="font-alt mb-30 titan-title-size-4" >ꦯꦸꦓꦺꦁꦫꦮꦸꦃ</div>
                <div class="font-alt mb-40 titan-title-size-1" style="font-family: 'Bebas Neue' sans-serif;" >SELAMAT DATANG</div>
                <div class="font-alt mb-40 titan-title-size-5" style="font-family: 'Bebas Neue' sans-serif;" >DI WEBSITE KELURAHAN SELOMERTO</div>
               
                <a class="section-scroll btn btn-border-w btn-round" href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </section>

    <!-- Section Services -->
    <section id="Pelayanan" class="bg-light pt-5 pb-5">
        <div class="container">
            <h2 class="text-center">Layanan Kami</h2>
            <p class="text-center">Pengajuan surat secara online dengan tata cara sebagai berikut:</p>
    
            <div class="row text-center mt-4">
                <!-- Tahap 1: Login -->
                <div class="col-md-4">
                    <div class="box-step">
                        <div class="icon-step">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h4>Tahap 1: Login</h4>
                        <p>Masuk ke sistem dengan menggunakan NIK dan password.</p>
                    </div>
                </div>
    
                <!-- Tahap 2: Mengisi Form -->
                <div class="col-md-4">
                    <div class="box-step">
                        <div class="icon-step">
                            <i class="fas fa-edit"></i>
                        </div>
                        <h4>Tahap 2: Mengisi Form</h4>
                        <p>Isi form pengajuan surat dengan data yang lengkap dan benar.</p>
                    </div>
                </div>
    
                <!-- Tahap 3: Menunggu Verifikasi -->
                <div class="col-md-4">
                    <div class="box-step">
                        <div class="icon-step">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Tahap 3: Menunggu Verifikasi</h4>
                        <p>Tunggu hingga surat diverifikasi dan disetujui oleh petugas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Profil" class="bg-dark text-white pt-5 pb-5">
        <div class="container">
            <h2 class="text-center">Profil Kelurahan Selomerto</h2>
            <p class="text-center">
                Kelurahan Selomerto adalah sebuah kelurahan yang berada di Kabupaten Wonosobo. 
                Instansi ini bertujuan untuk memberikan pelayanan publik yang terbaik bagi masyarakat.
            </p>
    
            <!-- Struktur Organisasi -->
            <h3 class="text-center mt-4">Struktur Organisasi</h3>
            <div class="row mt-4">
                <!-- Anggota 1 -->
                <div class="col-md-3">
                    <div class="box-member">
                        <img src="{{ asset('assets/img/anis_b.jpg') }}" alt="Anggota 1" class="img-fluid">
                        <h4>H.Anis B</h4>
                    </div>
                </div>
    
                <!-- Anggota 2 -->
                <div class="col-md-3">
                    <div class="box-member">
                        <img src="{{ asset('assets/img/gibran.jpeg') }}" alt="Anggota 2" class="img-fluid">
                        <h4>gibran S.ff</h4>
                    </div>
                </div>
    
                <!-- Anggota 3 -->
                <div class="col-md-3">
                    <div class="box-member">
                        <img src="{{ asset('assets/img/eri_pras.jpg') }}" alt="Anggota 3" class="img-fluid">
                        <h4>eripras .S.Pg</h4>
                    </div>
                </div>
    
                <!-- Anggota 4 -->
                <div class="col-md-3">
                    <div class="box-member">
                        <img src="{{ asset('assets/img/lurah.png') }}" alt="Anggota 4" class="img-fluid">
                        <h4>pak kaji</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="Kontak" class="bg-loght text-dark pt-5 pb-5">
        <div class="container">
            <h2 class="text-center mb-4">Kontak Kami</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-header">
                            <h4>Email</h4>
                        </div>
                        <div class="card-body">
                            <p>example@example.com</p>
                        </div>
                    </div>
    
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-header">
                            <h4>No Telepon</h4>
                        </div>
                        <div class="card-body">
                            <p>0286-3212-81</p>
                        </div>
                    </div>
    
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-header">
                            <h4>Alamat</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Jl. Banyumas KM.15, Jagalan, Selomerto,<br>
                                Kec. Selomerto, Kabupaten Wonosobo,<br>
                                Jawa Tengah 56361
                            </p>
                        </div>
                    </div>
    
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-header">
                            <h4>Jam Buka</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>Rabu: 08.00–16.00</li>
                                <li>Kamis: 08.00–16.00</li>
                                <li>Jumat: 08.00–16.00</li>
                                <li>Sabtu: Tutup</li>
                                <li>Minggu: Tutup</li>
                                <li>Senin: 08.00–16.00</li>
                                <li>Selasa: 08.00–16.00</li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <h4 class="text-center">Lokasi Kami</h4>
                    <div class="embed-responsive embed-responsive-16by9 mb-4">
                        <iframe class="embed-responsive-item" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1985.7404513188042!2d109.87654!3d-7.28263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6b66e10f5ff77d%3A0x24bcbb80b7c3d8ef!2sHVPM%2B49%20Selomerto%2C%20Kabupaten%20Wonosobo%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1618257045635!5m2!1sid!2sid" 
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    

    <!-- Bootstrap JS and Custom JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/landing.js') }}"></script>
</body>
</html>
