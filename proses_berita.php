<?php
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: admin/login.php");
    exit;
}

include 'includes/koneksi.php';

// Fungsi aman untuk upload
function uploadGambar($field_name, $target_dir = "assets/image/") {
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $file_name = $_FILES[$field_name]['name'];
    $file_tmp = $_FILES[$field_name]['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    if (!in_array($file_ext, $allowed_types)) return false;

    $new_filename = time() . '_' . uniqid() . '.' . $file_ext;
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($file_tmp, $target_file)) {
        return $new_filename;
    }
    return false;
}

// ===================
// Tambah Berita
// ===================
if (isset($_POST['tambah'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $gambar = '';

    if (!empty($_FILES['gambar']['name'])) {
        $upload = uploadGambar('gambar');
        if ($upload) $gambar = $upload;
    }

    $sql = "INSERT INTO berita (judul, isi, gambar, tanggal) VALUES ('$judul', '$isi', '$gambar', NOW())";
    mysqli_query($koneksi, $sql)
        ? header("Location: beritaadmin.php?success=tambah")
        : header("Location: beritaadmin.php?error=tambah");
    exit;
}

// ===================
// Hapus Berita
// ===================
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);

    $result = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id_berita = $id");
    $data = mysqli_fetch_assoc($result);

    if (!empty($data['gambar']) && file_exists("assets/image/" . $data['gambar'])) {
        unlink("assets/image/" . $data['gambar']);
    }

    $sql = "DELETE FROM berita WHERE id_berita = $id";
    mysqli_query($koneksi, $sql)
        ? header("Location: beritaadmin.php?success=hapus")
        : header("Location: beritaadmin.php?error=hapus");
    exit;
}

// Tidak ada aksi valid
header("Location: beritaadmin.php");
exit;
?>
