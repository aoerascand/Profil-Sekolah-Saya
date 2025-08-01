<?php
session_start();
include '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; 

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
    
    if (mysqli_num_rows($query) === 1) {
        $data = mysqli_fetch_assoc($query);
        // Untuk keamanan, sebaiknya password di-hash dengan password_hash()
        if (password_verify($password, $data['password']) || $password === $data['password']) {
            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['admin'] = $data['username'];
            header('Location: dashboard.php');
            exit;
        }
    }
    
    $_SESSION['error'] = "Username atau password salah!";
    header('Location: login.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>
?>