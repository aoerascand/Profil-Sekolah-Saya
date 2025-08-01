<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /admin/login.php");
    exit;
}

include 'includes/koneksi.php';
include 'includes/header.php';
?>

<!-- Konten form tambah berita di sini -->


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');
    $gambar = '';

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/image/" . $gambar);
    }

    if ($judul && $isi) {
        mysqli_query($koneksi, "INSERT INTO berita (judul, isi, tanggal, gambar) VALUES ('$judul', '$isi', '$tanggal', '$gambar')");
        header("Location: berita.php");
        exit;
    }
}
?>

<div class="container mt-4">
    <h2>Tambah Berita</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" rows="6" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="berita.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
