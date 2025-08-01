<?php
include 'includes/koneksi.php';
header('Content-Type: application/json');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$response = ['success' => false];

if ($id > 0) {
    $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = $id");
    if ($row = mysqli_fetch_assoc($query)) {
        $response = [
            'success' => true,
            'judul' => htmlspecialchars($row['judul']),
            'tanggal' => date('d M Y', strtotime($row['tanggal'])),
            'gambar' => htmlspecialchars($row['gambar']),
            'isi' => nl2br(htmlspecialchars($row['isi']))
        ];
    } else {
        $response['error'] = 'Berita tidak ditemukan';
    }
} else {
    $response['error'] = 'ID tidak diberikan';
}

echo json_encode($response);
