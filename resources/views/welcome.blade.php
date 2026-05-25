# resources/views/welcome.blade.php

```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Creative Presensi</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #0f172a;
            color: white;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff !important;
        }

        .navbar-brand span {
            color: #38bdf8;
        }

        .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            margin-left: 10px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #38bdf8 !important;
        }

        .btn-login {
            background: linear-gradient(135deg, #38bdf8, #6366f1);
            color: white;
            border-radius: 12px;
            padding: 10px 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(56,189,248,0.3);
            color: white;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 100px;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(56,189,248,0.2);
            filter: blur(120px);
            top: -100px;
            left: -100px;
            border-radius: 50%;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            background: rgba(99,102,241,0.2);
            filter: blur(120px);
            bottom: -100px;
            right: -100px;
            border-radius: 50%;
        }

        .hero-text h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-text p {
            color: #cbd5e1;
            font-size: 1.1rem;
            line-height: 1.9;
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-main {
            background: linear-gradient(135deg, #38bdf8, #6366f1);
            border: none;
            color: white;
            padding: 14px 30px;
            border-radius: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(56,189,248,0.35);
            color: white;
        }

        .btn-outline-custom {
            border: 1px solid rgba(255,255,255,0.15);
            color: white;
            padding: 14px 30px;
            border-radius: 14px;
            font-weight: 600;
            transition: 0.3s;
            background: rgba(255,255,255,0.05);
        }

        .btn-outline-custom:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .hero-card {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 30px;
            padding: 30px;
            backdrop-filter: blur(15px);
            position: relative;
            z-index: 10;
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
        }

        .dashboard-box {
            background: #111827;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .dashboard-box h5 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .attendance-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .attendance-item:last-child {
            border-bottom: none;
        }

        .status {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status.hadir {
            background: rgba(34,197,94,0.15);
            color: #22c55e;
        }

        .status.izin {
            background: rgba(250,204,21,0.15);
            color: #facc15;
        }

        .feature-section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-title p {
            color: #94a3b8;
            max-width: 700px;
            margin: auto;
        }

        .feature-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 25px;
            padding: 35px;
            transition: 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255,255,255,0.08);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: linear-gradient(135deg, #38bdf8, #6366f1);
            font-size: 1.6rem;
            margin-bottom: 25px;
        }

        .feature-card h4 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #cbd5e1;
            line-height: 1.8;
        }

        .stats-section {
            padding: 80px 0;
        }

        .stat-box {
            background: rgba(255,255,255,0.05);
            border-radius: 25px;
            padding: 35px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .stat-box h2 {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .footer {
            padding: 40px 0;
            border-top: 1px solid rgba(255,255,255,0.08);
            text-align: center;
            color: #94a3b8;
        }

        @media(max-width: 991px) {
            .hero-text {
                text-align: center;
                margin-bottom: 50px;
            }

            .hero-text h1 {
                font-size: 2.8rem;
            }

            .hero-buttons {
                justify-content: center;
            }
        }

        @media(max-width: 576px) {
            .hero-text h1 {
                font-size: 2.2rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                AI <span>Creative</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#statistik">Statistik</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a href="#" class="btn btn-login">
                            Login Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>
                            Sistem Presensi <span>AI Creative</span> Modern & Pintar
                        </h1>

                        <p>
                            Kelola presensi karyawan dengan teknologi AI yang cepat, modern, dan otomatis.
                            Pantau kehadiran secara realtime, analisa produktivitas, dan tingkatkan efisiensi perusahaan.
                        </p>

                        <div class="hero-buttons">
                            <a href="#fitur" class="btn btn-main">
                                <i class="fa-solid fa-rocket me-2"></i>
                                Jelajahi Fitur
                            </a>

                            <a href="#" class="btn btn-outline-custom">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                Masuk Sistem
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-card">

                        <div class="dashboard-box">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Dashboard Presensi</h5>
                                <span class="badge bg-success px-3 py-2">Realtime</span>
                            </div>

                            <div class="row text-center">
                                <div class="col-4">
                                    <h3 class="fw-bold">120</h3>
                                    <small class="text-secondary">Karyawan</small>
                                </div>

                                <div class="col-4">
                                    <h3 class="fw-bold text-success">112</h3>
                                    <small class="text-secondary">Hadir</small>
                                </div>

                                <div class="col-4">
                                    <h3 class="fw-bold text-warning">8</h3>
                                    <small class="text-secondary">Izin</small>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-box">
                            <h5>Aktivitas Hari Ini</h5>

                            <div class="attendance-item">
                                <div>
                                    <strong>Andi Saputra</strong>
                                    <div class="text-secondary small">08:01 WIB</div>
                                </div>
                                <span class="status hadir">Hadir</span>
                            </div>

                            <div class="attendance-item">
                                <div>
                                    <strong>Siti Rahma</strong>
                                    <div class="text-secondary small">08:15 WIB</div>
                                </div>
                                <span class="status hadir">Hadir</span>
                            </div>

                            <div class="attendance-item">
                                <div>
                                    <strong>Budi Santoso</strong>
                                    <div class="text-secondary small">08:35 WIB</div>
                                </div>
                                <span class="status izin">Izin</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="feature-section" id="fitur">
        <div class="container">

            <div class="section-title">
                <h2>Fitur Unggulan AI Creative</h2>
                <p>
                    Sistem presensi modern dengan teknologi AI untuk memudahkan monitoring,
                    absensi, laporan, dan pengelolaan data karyawan.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-face-smile"></i>
                        </div>

                        <h4>Face Recognition</h4>
                        <p>
                            Teknologi AI pendeteksi wajah untuk presensi otomatis yang cepat,
                            aman, dan akurat.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>

                        <h4>Realtime Monitoring</h4>
                        <p>
                            Pantau kehadiran seluruh karyawan secara realtime melalui dashboard modern.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-file-waveform"></i>
                        </div>

                        <h4>Laporan Otomatis</h4>
                        <p>
                            Generate laporan absensi otomatis harian, mingguan, hingga bulanan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>

                        <h4>Mobile Friendly</h4>
                        <p>
                            Akses sistem kapan saja melalui smartphone, tablet, maupun desktop.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <h4>Keamanan Tinggi</h4>
                        <p>
                            Data presensi tersimpan aman dengan sistem keamanan modern dan terenkripsi.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-brain"></i>
                        </div>

                        <h4>AI Analytics</h4>
                        <p>
                            Analisa performa dan kedisiplinan karyawan menggunakan kecerdasan buatan.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="stats-section" id="statistik">
        <div class="container">

            <div class="section-title">
                <h2>Statistik Sistem</h2>
                <p>
                    Sistem presensi AI Creative telah membantu banyak perusahaan meningkatkan efisiensi kerja.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stat-box">
                        <h2>98%</h2>
                        <p>Akurasi AI</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-box">
                        <h2>10K+</h2>
                        <p>Data Presensi</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-box">
                        <h2>500+</h2>
                        <p>Karyawan Aktif</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-box">
                        <h2>24/7</h2>
                        <p>Monitoring Sistem</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">
                © {{ date('Y') }} AI Creative Presensi Karyawan. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
