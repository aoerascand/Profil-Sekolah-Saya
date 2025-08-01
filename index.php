<?php 
include 'includes/header.php'; 
include 'functions.php'; 
?>

<!-- Tambahkan CSS AOS & CountUp + custom -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

<style>
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
</style>

<!-- Hero Section -->
<section class="bg-primary text-white py-5 text-center" data-aos="fade-down">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di Website Resmi</h1>
        <h2 class="fw-semibold">SMK Negeri 64 Jakarta</h2>
        <p class="lead mt-3">Sekolah Unggulan Berbasis Teknologi dan Karakter</p>
        <a href="profil.php" class="btn btn-light btn-lg mt-3">Lihat Profil Sekolah</a>
    </div>
</section>

<!-- Tentang Sekolah -->
<section class="py-5 bg-white" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="assets/image/depan.jpeg" alt="Gedung Sekolah" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="mb-3 section-title">Tentang Sekolah Kami</h3>
                <p>SMKN 64 Jakarta memiliki 2 kompetensi unggulan: RPL & DKV. Berdiri sejak 2019, kami siap mencetak lulusan yang siap kerja dan berkarakter.</p>
                <a href="profil.php" class="btn btn-outline-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section class="py-5 bg-soft-gray" data-aos="fade-up">
    <div class="container">
        <h3 class="section-title text-center mb-4">Visi & Misi Sekolah</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="p-4 bg-white rounded shadow-sm mb-4">
                    <h5 class="fw-bold">Visi</h5>
                    <p>Menjadi sekolah unggulan di bidang teknologi informasi yang menghasilkan lulusan berdaya saing global dan berkarakter.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h5 class="fw-bold">Misi</h5>
                    <ul class="mb-0">
                        <li>Mengembangkan kurikulum berbasis industri dan teknologi.</li>
                        <li>Mendorong budaya disiplin, kerja keras, dan inovatif.</li>
                        <li>Menyiapkan siswa menjadi tenaga kerja siap pakai atau wirausaha.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Sekolah -->
<section class="py-5 bg-soft-blue">
    <div class="container" data-aos="zoom-in">
        <h3 class="section-title text-center mb-5">Statistik Sekolah</h3>
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h1 class="text-primary countup" data-count="350">440</h1>
                    <p class="mb-0">Siswa Aktif</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h1 class="text-primary countup" data-count="25">23</h1>
                    <p class="mb-0">Guru Pengajar</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h1 class="text-primary countup" data-count="12">12</h1>
                    <p class="mb-0">Ruang Kelas</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h1 class="text-primary countup" data-count="2">2</h1>
                    <p class="mb-0">Kompetensi Keahlian</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="py-5 bg-white">
    <div class="container">
        <h3 class="section-title text-center mb-4">Berita Terbaru</h3>
        <?php
        include 'includes/koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");

        if ($data && mysqli_num_rows($data) > 0) {
            echo '<div class="row">';
            while ($row = mysqli_fetch_assoc($data)) {
                $judul = htmlspecialchars($row['judul']);
                $tanggal = date('d M Y', strtotime($row['tanggal']));
                $isi = strip_tags($row['isi']);
                $ringkasan = substr($isi, 0, 100) . '...';
                $gambar = !empty($row['gambar']) ? "assets/image/" . htmlspecialchars($row['gambar']) : "assets/image/depan.jpeg";
                $berita_id = intval($row['id_berita']);
        ?>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="<?= $berita_id * 100 ?>">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= $gambar ?>" class="card-img-top" alt="<?= $judul ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $judul ?></h5>
                            <p class="text-muted"><small><?= $tanggal ?></small></p>
                            <p class="card-text"><?= $ringkasan ?></p>
                            <a href="berita.php?id=<?= $berita_id ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
            echo '<div class="text-center mt-4">';
            echo '<a href="berita.php" class="btn btn-outline-primary">Lihat Semua Berita</a>';
            echo '</div>';
        } else {
            echo '<div class="text-center"><p class="text-muted">Belum ada berita yang tersedia.</p></div>';
        }
        ?>
    </div>
</section>

<!-- CTA -->
<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <h4 class="mb-3">Tertarik Bergabung dengan SMK Negeri 64 Jakarta?</h4>
        <a href="kontak.php" class="btn btn-light btn-lg">Hubungi Kami</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- Tambahkan AOS & CountUp.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
    document.addEventListener('DOMContentLoaded', function () {
        const stats = document.querySelectorAll('.countup');
        stats.forEach((stat) => {
            const endVal = parseInt(stat.dataset.count);
            const counter = new CountUp(stat, endVal);
            if (!counter.error) counter.start();
        });
    });
</script>
