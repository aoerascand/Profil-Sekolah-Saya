<?php
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: admin/login.php");
    exit;
}
include 'includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Berita - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #343a40; }
        .card { border: none; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin/dashboard.php">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
        <div class="d-flex">
            <a href="admin/logout.php" class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container my-4">
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            switch($_GET['success']) {
                case 'tambah': echo 'Berita berhasil ditambahkan!'; break;
                case 'edit': echo 'Berita berhasil diperbarui!'; break;
                case 'hapus': echo 'Berita berhasil dihapus!'; break;
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
            switch($_GET['error']) {
                case 'tambah': echo 'Gagal menambahkan berita!'; break;
                case 'edit': echo 'Gagal memperbarui berita!'; break;
                case 'hapus': echo 'Gagal menghapus berita!'; break;
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Kelola Berita</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBeritaModal">
                        <i class="bi bi-plus-circle"></i> Tambah Berita
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($query)):
                                    // Debug: cek struktur data
                                    // echo "<!-- Debug: " . print_r($row, true) . " -->";
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($row['judul']); ?></td>
                                    <td><?= $row['tanggal']; ?></td>
                                    <td>
                                        <?php if (!empty($row['gambar'])): ?>
                                            <img src="assets/image/<?= htmlspecialchars($row['gambar']); ?>" width="50" height="50" class="img-thumbnail">
                                        <?php else: ?>
                                            <span class="text-muted">Tidak ada gambar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['id_berita'])): ?>
                                            <button class="btn btn-sm btn-info" onclick="editBerita(<?= intval($row['id_berita']); ?>)">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="hapusBerita(<?= intval($row['id_berita']); ?>)">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        <?php else: ?>
                                            <span class="text-muted">ID tidak valid</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Berita -->
<div class="modal fade" id="tambahBeritaModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Berita Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="proses_berita.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" class="form-control" rows="6" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Berita -->
<div class="modal fade" id="editBeritaModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="proses_berita.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul" id="edit_judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" id="edit_isi" class="form-control" rows="6" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function editBerita(id) {
    // Ambil data berita via AJAX
    fetch('get_berita.php?id=' + id)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                alert('Error: ' + data.error);
                return;
            }
            document.getElementById('edit_id').value = data.id_berita;
            document.getElementById('edit_judul').value = data.judul;
            document.getElementById('edit_isi').value = data.isi;

            document.querySelector('#editBeritaModal form').action = 'admin/edit_berita.php?id_berita=' + id;


            new bootstrap.Modal(document.getElementById('editBeritaModal')).show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal mengambil data berita. Silakan coba lagi.');
        });
}

function hapusBerita(id) {
    if (confirm('Yakin ingin menghapus berita ini?')) {
        if (id && id > 0) {
            window.location.href = 'proses_berita.php?hapus=' + id;
        } else {
            alert('ID berita tidak valid!');
        }
    }
}
</script>

</body>
</html>
