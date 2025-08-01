<?php
include 'includes/koneksi.php';
include 'includes/header.php';
include 'functions.php';
?>

<!-- CSS Bootstrap & AOS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    h2, h3 {
        font-weight: 600;
    }

    .bg-soft-blue {
        background-color: #e6f0ff;
    }

    .bg-soft-gray {
        background-color: #f4f6f9;
    }

    .section-title {
        font-weight: 600;
        color: #0d47a1;
    }

    ul {
        padding-left: 20px;
    }

    ul li {
        margin-bottom: 10px;
    }

    .shadow-sm {
        box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.05) !important;
    }
</style>

<!-- Section Judul -->
<section class="bg-primary text-white py-5 text-center" data-aos="fade-down">
    <div class="container">
        <h2 class="display-5 fw-bold mb-0">Profil Sekolah</h2>
        <p class="lead">SMK Negeri 64 Jakarta</p>
    </div>
</section>

<!-- Visi -->
<section class="py-5 bg-white">
    <div class="container" data-aos="fade-right">
        <div class="p-4 rounded shadow-sm bg-white">
            <h3 class="text-primary"><i class="bi bi-eye-fill me-2"></i>Visi</h3>
            <p class="mb-0">Memiliki tamatan yang Berbudi pekerti luhur, Berkarakter, Mandiri, Berprestasi dan Berjiwa Wirausaha.</p>
        </div>
    </div>
</section>

<!-- Misi -->
<section class="py-5 bg-soft-blue">
    <div class="container" data-aos="fade-left">
        <div class="p-4 rounded shadow-sm bg-white">
            <h3 class="text-success"><i class="bi bi-flag-fill me-2"></i>Misi</h3>
            <ul class="mt-3">
                <li>Mengimplementasikan 5S (Senyum, Sapa, Salam, Sopan dan Santun).</li>
                <li>Membangun peserta didik menjadi seseorang yang memiliki sikap profesional.</li>
                <li>Mengarahkan peserta didik untuk meningkatkan potensi dan keahlian diri melalui pelatihan di dalam maupun di luar lingkungan sekolah.</li>
                <li>Menyiapkan tamatan agar mendapatkan prestasi juara di tingkat nasional dengan pelatihan di setiap kompetensi.</li>
                <li>Mengarahkan peserta didik mempunyai jiwa wirausaha melalui pelajaran kewirausahaan.</li>
            </ul>
        </div>
    </div>
</section>

<!-- Sejarah Singkat -->
<section class="py-5 bg-soft-gray">
    <div class="container" data-aos="fade-up">
        <div class="p-4 rounded shadow-sm bg-white">
            <h3 class="text-warning"><i class="bi bi-clock-history me-2"></i>Sejarah Singkat</h3>
            <p>SMKN 64 Jakarta adalah sekolah kejuruan yang berbasis pada teknologi informasi dengan memiliki 2 (dua) kompetensi unggulan:</p>
            <ul>
                <li><strong>RPL</strong> (Rekayasa Perangkat Lunak)</li>
                <li><strong>Desain Komunikasi Visual</strong></li>
            </ul>
            <p>Berdiri sejak tahun 2019, SMKN 64 Jakarta merupakan sekolah baru yang ingin menjaring peserta didik lulusan SMP yang memiliki minat dengan kejuruan teknologi dan informasi.</p>
        </div>
    </div>
</section>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

<?php include 'includes/footer.php'; ?>
