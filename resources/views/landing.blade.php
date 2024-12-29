<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SISPUS - Sistem Informasi Pengajuan Surat</title>
    
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ ('assets/img/logo_wsb.png') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <!-- Link FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    
        <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Optional: Font Awesome -->
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="navbarResponsive">
            <div class="container">
                <a class="navbar-brand" href="#">SISPUS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Pelayanan">Pelayanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#informasi">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Profil">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Kontak">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light btn-sm" href="{{ route('login') }}" style="border: none;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <!-- Hero Section -->
        <div class="container-fluid bg-primary text-white py-5" id="home" style="height: 100vh; background: url('path-to-image.jpg') no-repeat center center/cover;">
            <div class="row h-100 align-items-center">
                <div class="col-md-12 text-center">
                    <h2 class="display-4 mb-3">ꦯꦸꦓꦺꦁꦫꦮꦸꦃ</h2>
                    <h1 class="fw-bold">SELAMAT DATANG</h1>
                    <h3 class="mb-4">DI WEBSITE KELURAHAN SELOMERTO</h3>
                    <a class="btn btn-light btn-lg" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>

        <!-- Section Pelayanan -->
        <section id="Pelayanan" class="py-5 bg-light">
            <div class="container">
                <!-- Judul Section -->
                <div class="row mb-4">
                    <div class="col text-center">
                        <h2 class="display-5 fw-bold">Pelayanan</h2>
                        <p class="text-muted">Cara Mengajukan Surat di Kelurahan Selomerto</p>
                        <hr class="w-25 mx-auto">
                    </div>
                </div>

                <!-- Kotak-Kotak Langkah-Langkah Mengajukan Surat -->
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="service-box p-4 rounded shadow-sm bg-white text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-sign-in-alt fa-3x text-primary"></i>
                            </div>
                            <h4 class="fw-bold">1. Login ke Sistem</h4>
                            <p class="text-muted">Masuk ke akun Anda dengan menggunakan NIK dan password Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box p-4 rounded shadow-sm bg-white text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-bars fa-3x text-success"></i>
                            </div>
                            <h4 class="fw-bold">2. Pilih Menu "Ajukan Surat"</h4>
                            <p class="text-muted">Klik menu pengajuan surat di dashboard Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box p-4 rounded shadow-sm bg-white text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-edit fa-3x text-warning"></i>
                            </div>
                            <h4 class="fw-bold">3. & PILIH SURAT & Isi Formulir</h4>
                            <p class="text-muted">Masukkan data yang diperlukan seperti nama, alamat, dan alasan pengajuan surat. Nama dan NIK akan terisi otomatis.</p>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mt-3">
                    <div class="col-md-4">
                        <div class="service-box p-4 rounded shadow-sm bg-white text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-paper-plane fa-3x text-info"></i>
                            </div>
                            <h4 class="fw-bold">4. Kirim Pengajuan</h4>
                            <p class="text-muted">Klik tombol "Kirim" untuk mengajukan surat Anda. Anda akan menerima notifikasi setelah pengajuan berhasil.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box p-4 rounded shadow-sm bg-white text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-search fa-3x text-secondary"></i>
                            </div>
                            <h4 class="fw-bold">5. Cek Status Surat</h4>
                            <p class="text-muted">Periksa status pengajuan surat Anda untuk mengetahui apakah surat Anda sudah diterima.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box p-4 rounded shadow-sm bg-white text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-download fa-3x text-success"></i>
                            </div>
                            <h4 class="fw-bold">7. Unduh Surat</h4>
                            <p class="text-muted">Jika surat Anda sudah diterima, Anda dapat mengunduh surat tersebut dari sistem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


                <!-- Optional: Add custom scroll on navbar effect -->
                <script>
                    // Add 'scroll-on' class to the navbar when scrolling down
                    window.onscroll = function() {
                        var navbar = document.getElementById("navbarResponsive");
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            navbar.classList.add("scroll-on");
                        } else {
                            navbar.classList.remove("scroll-on");
                        }
                    };
                </script>
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap JS and Custom JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <!-- Custom JS -->
        <script src="{{ asset('assets/js/landing.js') }}"></script>

    </body>

    
    
