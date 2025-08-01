<?php
include 'includes/koneksi.php';
include 'includes/header.php';
?>

<!-- CSS Bootstrap, Icons, AOS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .bg-soft-gray {
        background-color: #f9f9f9;
    }
    .bg-soft-blue {
        background-color: #eef6ff;
    }
    .card-title {
        font-weight: 600;
    }
    .card-text {
        font-size: 0.95rem;
    }
</style>

<!-- Hero Section -->
<section class="bg-primary text-white py-5 text-center" data-aos="fade-down">
    <div class="container">
        <h2 class="display-5 fw-bold mb-0">Daftar Berita</h2>
        <p class="lead">Informasi terbaru dari SMKN 64 Jakarta</p>
    </div>
</section>

<!-- Berita Cards -->
<section class="py-5 bg-soft-gray">
    <div class="container">
        <div class="row">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");

            if ($query && mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $judul = htmlspecialchars($row['judul']);
                    $tanggal = date('d M Y', strtotime($row['tanggal']));
                    $isi = strip_tags($row['isi']);
                    $ringkasan = substr($isi, 0, 150) . '...';
                    $gambar = !empty($row['gambar']) ? "assets/image/" . htmlspecialchars($row['gambar']) : "assets/image/depan.jpeg";
                    $berita_id = intval($row['id_berita']);
            ?>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $gambar ?>" class="card-img-top" alt="<?= $judul ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $judul ?></h5>
                        <p class="text-muted mb-2">
                            <i class="bi bi-calendar3"></i> <?= $tanggal ?>
                        </p>
                        <p class="card-text flex-grow-1"><?= $ringkasan ?></p>
                        <a href="#" class="btn btn-primary btn-sm mt-2"
                           onclick="tampilkanBerita(event, <?= $berita_id ?>)">
                           <i class="bi bi-book"></i> Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo '<div class="col-12 text-center"><p class="text-muted">Belum ada berita yang tersedia.</p></div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Modal Detail Berita -->
<div class="modal fade" id="modalDetailBerita" tabindex="-1" aria-labelledby="modalBeritaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBeritaLabel">Judul Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted" id="modalTanggal"></p>
        <img id="modalGambar" src="" alt="Gambar" class="img-fluid rounded mb-3" style="display: none;">
        <div id="modalIsiBerita"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Script AJAX Modal Berita -->
<script>
function tampilkanBerita(e, id) {
    e.preventDefault();

    fetch('get_berita.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('modalBeritaLabel').innerText = data.judul;
                document.getElementById('modalTanggal').innerText = data.tanggal;

                const gambar = document.getElementById('modalGambar');
                if (data.gambar) {
                    gambar.src = 'assets/image/' + data.gambar;
                    gambar.style.display = 'block';
                } else {
                    gambar.style.display = 'none';
                }

                document.getElementById('modalIsiBerita').innerHTML = data.isi;

                new bootstrap.Modal(document.getElementById('modalDetailBerita')).show();
            } else {
                alert('Berita tidak ditemukan.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memuat berita.');
        });
}
</script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

<?php include 'includes/footer.php'; ?>
