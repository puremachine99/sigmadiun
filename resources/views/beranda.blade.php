@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
    :root {
        --primary: #006400;
        --secondary: #FFD700;
        --accent: #1E3A8A;
        --light: #F8F9FA;
        --dark: #212529;
    }

    body {
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
        line-height: 1.6;
    }

    .navbar {
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
        height: 50px;
    }

    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1519501025264-65ba15a82390?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        min-height: 90vh;
        display: flex;
        align-items: center;
        color: white;
        padding-top: 80px;
    }

    .hero-content {
        max-width: 800px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background-color: #004d00;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-light {
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-3px);
    }

    .section-title {
        position: relative;
        margin-bottom: 3rem;
        font-weight: 700;
        color: var(--primary);
        text-align: center;
    }

    .section-title:after {
        content: "";
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--secondary);
    }

    .stat-card {
        text-align: center;
        padding: 30px 20px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
        margin-bottom: 20px;
        background: white;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0;
    }

    .stat-label {
        font-size: 1.1rem;
        color: var(--dark);
    }

    .sector-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s;
        height: 100%;
        background: white;
        margin-bottom: 30px;
    }

    .sector-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .sector-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .sector-content {
        padding: 25px;
    }

    .sector-icon {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 15px;
    }

    .map-container {
        height: 450px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .umkm-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
        height: 100%;
    }

    .umkm-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .umkm-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .commitment-section {
        background: linear-gradient(rgba(0, 100, 0, 0.9), rgba(0, 100, 0, 0.9)), url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
    }

    .quote-icon {
        font-size: 4rem;
        opacity: 0.2;
        position: absolute;
        top: -20px;
        left: 0;
    }

    .quote-text {
        font-size: 1.5rem;
        font-weight: 300;
        position: relative;
        padding-left: 30px;
        border-left: 4px solid var(--secondary);
    }

    .accordion-button {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .contact-section {
        background-color: var(--light);
        padding: 100px 0;
    }

    .form-control {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    }

    footer {
        background-color: var(--dark);
        color: white;
        padding: 50px 0 20px;
    }

    .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        margin-right: 10px;
        transition: all 0.3s;
    }

    .social-icon:hover {
        background-color: var(--primary);
        transform: translateY(-5px);
    }

    .whatsapp-btn {
        background-color: #25D366;
        color: white;
        font-weight: 600;
    }

    .whatsapp-btn:hover {
        background-color: #128C7E;
        color: white;
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        z-index: 1000;
        opacity: 0.7;
        transition: all 0.3s;
        display: none;
    }

    .back-to-top:hover {
        opacity: 1;
        transform: translateY(-5px);
    }

    /* Spacing adjustments */
    section {
        padding: 80px 0;
    }

    .bg-light {
        background-color: var(--light) !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        section {
            padding: 60px 0;
        }

        .stat-number {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 576px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .hero-content .d-flex {
            flex-direction: column;
        }
    }
</style>
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Selamat Datang di Website Peta Potensi Kab Madiun</h1>
                <p class="hero-subtitle">Didukung infrastruktur, UMKM dinamis, dan komitmen Pemkab</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#potensi" class="btn btn-primary btn-lg">Lihat Potensi Investasi</a>
                    <a href="#kontak" class="btn btn-outline-light btn-lg">Ajukan Minat</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Data Makro -->
    <section id="data-makro" class="py-5">
        <div class="container py-5">
            <h2 class="section-title">Data Makro Daerah</h2>
            <p class="text-center mb-5">
                Kabupaten Madiun menawarkan skala dan kesiapan infrastruktur yang menjanjikan
            </p>

            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $totalLahan }} Ha</div>
                        <div class="stat-label">Lahan Potensial</div>
                        <div class="mt-3">
                            <i class="fas fa-landmark fa-3x text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">Rp {{ $totalInvestasiInvestor }}</div>
                        <div class="stat-label">Investasi Investor</div>
                        <div class="mt-3">
                            <i class="fas fa-coins fa-3x text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $jumlahPenduduk }}</div>
                        <div class="stat-label">Jumlah Penduduk</div>
                        <div class="mt-3">
                            <i class="fas fa-users fa-3x text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $jumlahPotensi }}</div>
                        <div class="stat-label">Jenis Potensi</div>
                        <div class="mt-3">
                            <i class="fas fa-lightbulb fa-3x text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $jumlahPeluang }}</div>
                        <div class="stat-label">Peluang Investasi</div>
                        <div class="mt-3">
                            <i class="fas fa-rocket fa-3x text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $jumlahInvestor }}</div>
                        <div class="stat-label">Jumlah Investor</div>
                        <div class="mt-3">
                            <i class="fas fa-user-tie fa-3x text-muted"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary btn-lg">Lihat Statistik Lengkap</a>
            </div>
        </div>
    </section>

    <!-- Potensi Unggulan -->
    <section id="potensi" class="py-5 bg-light">
        <div class="container py-5">
            <h2 class="section-title">Potensi Unggulan Daerah</h2>
            <p class="text-center mb-5">Temukan sektor-sektor investasi yang menjadi andalan Kabupaten Madiun</p>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="sector-card">
                        <img src="{{ asset('images/agribisnis.jpeg') }}" alt="Agribisnis" class="sector-img">
                        <div class="sector-content">
                            <div class="sector-icon">
                                <i class="fas fa-tractor"></i>
                            </div>
                            <h3>Agribisnis</h3>
                            <p>Kabupaten Madiun memiliki lahan pertanian subur seluas 50.000 hektar dengan produksi padi mencapai 500.000 ton per tahun.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Detail Sektor</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sector-card">
                        <img src="https://images.unsplash.com/photo-1591696205602-2f950c417dad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Perikanan" class="sector-img">
                        <div class="sector-content">
                            <div class="sector-icon">
                                <i class="fas fa-fish"></i>
                            </div>
                            <h3>Perikanan</h3>
                            <p>Potensi perikanan air tawar dengan produksi tahunan lebih dari 12.000 ton dan pengembangan teknologi budidaya modern.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Detail Sektor</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sector-card">
                        <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Industri Kreatif" class="sector-img">
                        <div class="sector-content">
                            <div class="sector-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h3>Industri Kreatif</h3>
                            <p>Sentra kerajinan tangan dan industri kreatif yang telah menembus pasar ekspor dengan lebih dari 500 pengrajin lokal.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Detail Sektor</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sector-card">
                        <img src="https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Pariwisata" class="sector-img">
                        <div class="sector-content">
                            <div class="sector-icon">
                                <i class="fas fa-mountain"></i>
                            </div>
                            <h3>Pariwisata</h3>
                            <p>Destinasi wisata alam dan budaya yang menarik lebih dari 500.000 wisatawan setiap tahunnya.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Detail Sektor</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sector-card">
                        <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Logistik" class="sector-img">
                        <div class="sector-content">
                            <div class="sector-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <h3>Logistik</h3>
                            <p>Lokasi strategis di jalur distribusi Jawa Timur dengan akses tol dan jalur kereta api yang terintegrasi.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Detail Sektor</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sector-card">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Energi Terbarukan" class="sector-img">
                        <div class="sector-content">
                            <div class="sector-icon">
                                <i class="fas fa-solar-panel"></i>
                            </div>
                            <h3>Energi Terbarukan</h3>
                            <p>Potensi pengembangan energi terbarukan dari sumber daya alam yang melimpah di Kabupaten Madiun.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Detail Sektor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Interaktif -->
    <section id="peta" class="py-5">
        <div class="container py-5">
            <h2 class="section-title">Peta Potensi Investasi</h2>
            <p class="text-center mb-5">Temukan lokasi strategis untuk investasi di Kabupaten Madiun</p>

            <div class="map-container" id="map"></div>

            <div class="text-center">
                <a href="#" class="btn btn-primary btn-lg">Jelajahi Peta Interaktif</a>
            </div>
        </div>
    </section>

    <!-- UMKM Showcase -->
    <section id="umkm" class="py-5 bg-light">
        <div class="container py-5">
            <h2 class="section-title">Potensi UMKM Lokal</h2>
            <p class="text-center mb-5">Dinamika ekonomi dan peluang kolaborasi dengan UMKM Kabupaten Madiun</p>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="umkm-card">
                        <img src="https://images.unsplash.com/photo-1600857062241-98c0b05794b4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Kerajinan Bambu" class="umkm-img">
                        <div class="p-4">
                            <h4>Kerajinan Bambu Madiun</h4>
                            <p class="text-muted">Kerajinan & Handicraft</p>
                            <p class="mb-3">Produk kerajinan bambu berkualitas ekspor dengan desain kontemporer.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="umkm-card">
                        <img src="https://images.unsplash.com/photo-1598974357801-cbca100e65d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Keripik Pisang" class="umkm-img">
                        <div class="p-4">
                            <h4>Keripik Pisang Madiun</h4>
                            <p class="text-muted">Makanan Olahan</p>
                            <p class="mb-3">Produk makanan khas dengan varian rasa unik dan kemasan modern.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="umkm-card">
                        <img src="https://images.unsplash.com/photo-1594041680534-e8c8cdebd659?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Konveksi" class="umkm-img">
                        <div class="p-4">
                            <h4>Konveksi Batik Madiun</h4>
                            <p class="text-muted">Tekstil & Fashion</p>
                            <p class="mb-3">Produk tekstil dan batik dengan motif khas Madiun yang modern.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="#" class="btn btn-primary btn-lg">Lihat Semua UMKM</a>
            </div>
        </div>
    </section>

    <!-- Komitmen Pemerintah -->
    <section class="commitment-section">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="quote-text">Kabupaten Madiun berkomitmen penuh menciptakan iklim investasi yang kondusif dengan pelayanan satu pintu, insentif menarik, dan dukungan penuh dari pemerintah daerah.</p>
                        <div class="mt-4 d-flex align-items-center">
                            <div class="bg-white rounded-circle" style="width: 80px; height: 80px; overflow: hidden;">
                                <img src="#" alt="Bupati" class="img-fluid">
                            </div>
                            <div class="ms-3">
                                <h4 class="mb-0">John Doe</h4>
                                <p class="mb-0">Bupati Madiun</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-white rounded p-4 p-lg-5">
                        <h3 class="text-dark mb-4">Dukungan Pemerintah</h3>
                        <div class="d-flex mb-4">
                            <div class="me-4 text-primary">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="text-dark">Pelayanan Satu Pintu</h4>
                                <p class="text-dark">Proses perizinan investasi yang cepat melalui sistem satu pintu dengan waktu penyelesaian maksimal 3 hari kerja.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="me-4 text-primary">
                                <i class="fas fa-percentage fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="text-dark">Insentif Investasi</h4>
                                <p class="text-dark">Berbagai insentif fiskal dan non-fiskal untuk investasi di sektor prioritas dengan nilai investasi minimal Rp 10 miliar.</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-4 text-primary">
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="text-dark">Pendampingan Investasi</h4>
                                <p class="text-dark">Tim khusus pendamping investasi yang siap membantu mulai dari tahap perencanaan hingga operasional.</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary">Baca Komitmen Lengkap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-5">
        <div class="container py-5">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="text-center mb-5">Temukan jawaban atas pertanyaan investor tentang berinvestasi di Madiun</p>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Bagaimana proses perizinan investasi di Kabupaten Madiun?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kabupaten Madiun menerapkan sistem perizinan terintegrasi satu pintu (OSS) dengan proses maksimal 3 hari kerja untuk investasi di atas Rp 10 miliar. Tim khusus akan mendampingi investor selama proses perizinan.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Apa bentuk dukungan Pemkab bagi investor?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Pemkab Madiun memberikan berbagai dukungan berupa: (1) Insentif pajak daerah, (2) Fasilitasi perizinan, (3) Penyediaan infrastruktur pendukung, (4) Pendampingan teknis, (5) Akses ke jaringan UMKM lokal.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Bagaimana kemudahan akses lokasi investasi?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kabupaten Madiun memiliki akses transportasi strategis dengan jarak tempuh 1 jam dari Bandara Internasional Juanda, terhubung jaringan tol Trans Jawa, dan memiliki jalur kereta api aktif. Semua kawasan industri memiliki akses jalan yang memadai.
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary btn-lg">Lihat FAQ Lengkap</a>
            </div>
        </div>
    </section>

    <!-- Form Minat Investasi -->
    <section id="kontak" class="contact-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="section-title text-start">Ajukan Minat Investasi</h2>
                    <p>Isi formulir berikut untuk menghubungi tim investasi Kabupaten Madiun. Kami akan segera merespons permintaan Anda dalam waktu 1x24 jam.</p>

                    <div class="mt-5">
                        <h4 class="mb-3">Kantor PMPTSP Kabupaten Madiun</h4>
                        <p><i class="fas fa-map-marker-alt me-2 text-primary"></i> Jl. Raya Madiun-Ponorogo Km. 6, Balerejo, Madiun</p>
                        <p><i class="fas fa-phone me-2 text-primary"></i> (0351) 461777</p>
                        <p><i class="fas fa-envelope me-2 text-primary"></i> invest@madiunkab.go.id</p>

                        <div class="mt-4">
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-download me-2"></i> Download Profil Investasi (PDF)
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body p-4 p-lg-5">
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="tel" class="form-control" placeholder="Telepon/WhatsApp">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Perusahaan">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select">
                                        <option selected>Bidang Minat Investasi</option>
                                        <option>Agribisnis</option>
                                        <option>Perikanan</option>
                                        <option>Industri Kreatif</option>
                                        <option>Pariwisata</option>
                                        <option>Logistik</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="4" placeholder="Pesan"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Kirim Minat Investasi</button>
                                </div>
                                <div class="text-center mt-3">
                                    <p class="mb-2">Atau hubungi kami melalui WhatsApp</p>
                                    <a href="#" class="btn whatsapp-btn btn-lg">
                                        <i class="fab fa-whatsapp me-2"></i> WhatsApp Tim Investasi
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
@endsection

@section('footer')
    <x-footer />
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // Initialize map
        const map = L.map('map').setView([-7.6167, 111.5247], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add markers for potential locations
        const locations = [
            { lat: -7.6167, lng: 111.5247, title: 'Kawasan Industri Balerejo' },
            { lat: -7.5900, lng: 111.4500, title: 'Sentra Agribisnis Dagangan' },
            { lat: -7.6350, lng: 111.5800, title: 'Zona Ekonomi Kreatif Madiun' },
            { lat: -7.6500, lng: 111.5000, title: 'Pelabuhan Kargo Saradan' },
            { lat: -7.7000, lng: 111.5500, title: 'Kawasan Wisata Caruban' }
        ];

        locations.forEach(loc => {
            L.marker([loc.lat, loc.lng]).addTo(map)
                .bindPopup(loc.title);
        });

        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'flex';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endsection