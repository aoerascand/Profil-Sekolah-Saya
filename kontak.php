<?php
include 'includes/koneksi.php';
include 'includes/header.php';
?>

<!-- CSS & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .bg-soft-blue {
        background-color: #eef6ff;
    }
    .form-control, .btn {
        border-radius: 8px;
    }
</style>

<!-- Hero -->
<section class="bg-primary text-white py-5 text-center" data-aos="fade-down">
    <div class="container">
        <h2 class="display-5 fw-bold mb-2">Hubungi Kami</h2>
        <p class="lead mb-0">Kami siap menjawab pertanyaan Anda</p>
    </div>
</section>

<!-- Kontak & Form -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <!-- Kontak -->
            <div class="col-md-6 mb-4" data-aos="fade-right">
                <div class="p-4 bg-soft-blue rounded shadow-sm h-100">
                    <h4 class="mb-4 text-primary"><i class="bi bi-info-circle-fill me-2"></i>Informasi Kontak</h4>
                    <div class="mb-3 d-flex">
                        <i class="bi bi-geo-alt-fill text-primary fs-5 me-3"></i>
                        <div>
                            <strong>Alamat:</strong><br>
                            Jl. Mpo Nori RT 09 RW 03, Kel. Bambu Apus, Cipayung, Jakarta Timur
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <i class="bi bi-telephone-fill text-primary fs-5 me-3"></i>
                        <div>
                            <strong>Telepon:</strong><br>
                            08978891895 (Hilal), 081212001521 (Agus)
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <i class="bi bi-envelope-fill text-primary fs-5 me-3"></i>
                        <div>
                            <strong>Email:</strong><br>
                            info@smkn64jakarta.sch.id
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <i class="bi bi-clock-fill text-primary fs-5 me-3"></i>
                        <div>
                            <strong>Jam Operasional:</strong><br>
                            Senin - Jumat: 07:00 - 15:00 WIB
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulir -->
            <div class="col-md-6" data-aos="fade-left">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <h4 class="mb-4 text-primary"><i class="bi bi-chat-left-text-fill me-2"></i>Kirim Pesan</h4>
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subjek" class="form-label">Subjek</label>
                            <input type="text" class="form-control" id="subjek" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peta -->
<section class="bg-soft-blue py-5" data-aos="zoom-in">
    <div class="container">
        <h4 class="text-primary text-center mb-4"><i class="bi bi-geo-alt-fill me-2"></i>Lokasi Kami</h4>
        <div class="ratio ratio-16x9 rounded shadow-sm">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6666666666667!2d106.9!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNTQnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- JS AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

<?php include 'includes/footer.php'; ?>
