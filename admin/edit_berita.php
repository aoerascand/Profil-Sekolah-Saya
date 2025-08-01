<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /admin/login.php");
    exit;
}

include '../includes/koneksi.php';
include '../includes/header.php';

$id = $_GET['id_berita'] ?? $_POST['id_berita'] ?? null;
if (!$id) {
    die("ID berita tidak ditemukan.");
}

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = $id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/image/" . $gambar);
        $update = "UPDATE berita SET judul='$judul', isi='$isi', gambar='$gambar' WHERE id_berita=$id";
    } else {
        $update = "UPDATE berita SET judul='$judul', isi='$isi' WHERE id_berita=$id";
    }

    mysqli_query($koneksi, $update);
    header("Location: ../beritaadmin.php?success=edit");
    exit;
}
?>

<div class="container mt-4">
    <h2>Edit Berita</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_berita" value="<?= $data['id_berita'] ?>">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" rows="6" class="form-control" required><?= htmlspecialchars($data['isi']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Lama:</label><br>
            <?php if ($data['gambar']) : ?>
                <img src="../assets/image/<?= htmlspecialchars($data['gambar']) ?>" width="120"><br>
            <?php endif; ?>
            <label>Ganti Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="berita.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
