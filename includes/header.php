<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Website Berita Sekolah</title>

  <!-- Google Fonts (Modern) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



  <style>
        .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .card {
        transition: all 0.3s ease;
    }


    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar {
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      font-weight: 600;
      font-size: 1.5rem;
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      margin-left: 15px;
      transition: 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #ffc107 !important;
    }

    main.container {
      padding-top: 30px;
      padding-bottom: 30px;
    }

    footer {
      background-color: #343a40;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 40px;
    }
  </style>
</head>
<body>

 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/webberita/index.php">
      <img src="assets/image/logo.png" alt="Logo SMKN 64" width="40" height="40" class="me-2" />
      <span class="fw-semibold">SMK Negeri 64</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="/webberita/index.php">
            <i class="bi bi-house-door-fill me-2"></i> Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="/webberita/profil.php">
            <i class="bi bi-info-circle-fill me-2"></i> Profil Sekolah
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="/webberita/berita.php">
            <i class="bi bi-newspaper me-2"></i> Berita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="/webberita/kontak.php">
            <i class="bi bi-envelope-fill me-2"></i> Kontak
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="admin/login.php">
            <i class="bi bi-lock-fill me-2"></i> Admin
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <main class="container mt-4">

