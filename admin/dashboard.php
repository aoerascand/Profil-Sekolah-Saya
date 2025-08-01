<?php
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
        }
        .btn-custom {
            background-color: #0d6efd;
            color: white;
            font-weight: 500;
        }
        .btn-custom:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card p-4">
                <h3 class="mb-3">Halo, <?= htmlspecialchars($_SESSION['admin']); ?> 👋</h3>
                <p class="text-muted">Selamat datang di halaman Dashboard Admin Website Profil Sekolah.</p>

                <hr>

                <div class="d-flex gap-3 flex-wrap">
                    <a href="../beritaadmin.php" class="btn btn-custom">
                        <i class="bi bi-newspaper"></i> Kelola Berita
                    </a>
                    <a href="../index.php" target="_blank" class="btn btn-outline-secondary">
                        <i class="bi bi-globe"></i> Lihat Website
                    </a>
                    <a href="logout.php" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>