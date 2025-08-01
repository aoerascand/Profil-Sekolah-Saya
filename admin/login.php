<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin - SMKN 64 Jakarta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
  <style>
    body {
      background: linear-gradient(to right, #007bff, #00bcd4);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-box {
      width: 100%;
      max-width: 420px;
      padding: 40px 30px;
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .login-box img {
      width: 80px;
      margin-bottom: 15px;
    }
    .login-box h3 {
      margin-bottom: 25px;
      font-weight: 600;
      color: #333;
    }
    .form-control {
      border-radius: 8px;
    }
    .btn-success {
      border-radius: 8px;
      font-weight: 500;
    }
    .alert {
      font-size: 0.9rem;
    }
    .input-group-text {
      background-color: #e9ecef;
      border-radius: 8px 0 0 8px;
    }
    .back-link {
      margin-top: 15px;
      display: block;
      font-size: 0.9rem;
    }
    .back-link i {
      margin-right: 5px;
    }
  </style>
</head>
<body>
<?php session_start(); ?>
  <div class="login-box">
    <!-- Logo Tengah -->
    <img src="../assets/image/kl.jpg" alt="Logo Sekolah">
    <h3>Login Admin</h3>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form action="login_proses.php" method="POST">
      <div class="mb-3 text-start">
        <label class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" name="username" class="form-control" required>
        </div>
      </div>
      <div class="mb-3 text-start">
        <label class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" name="password" class="form-control" required>
        </div>
      </div>
      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>

    <!-- Back to homepage -->
    <a href="../index.php" class="back-link text-decoration-none text-secondary">
      <i class="bi bi-arrow-left-circle"></i> Kembali ke Beranda
    </a>
  </div>
</body>
</html>
