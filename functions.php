<?php
// Fungsi untuk mengecek apakah user adalah admin
function cek_admin() {
    if (!isset($_SESSION['id_admin'])) {
        header("Location: admin/login.php");
        exit;
    }
}

// Fungsi untuk membersihkan input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Fungsi untuk format tanggal Indonesia
function format_tanggal_indonesia($tanggal) {
    $bulan = array(
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    
    $split = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    
    return $tgl_indo;
}

// Fungsi untuk membuat ringkasan teks
function buat_ringkasan($teks, $panjang = 150) {
    $teks = strip_tags($teks);
    if (strlen($teks) > $panjang) {
        return substr($teks, 0, $panjang) . '...';
    }
    return $teks;
}

// Fungsi untuk upload gambar
function upload_gambar($file, $target_dir = "assets/image/") {
    if (!empty($file['name'])) {
        $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $new_filename = time() . '_' . uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($file_extension, $allowed_types) && move_uploaded_file($file["tmp_name"], $target_file)) {
            return $new_filename;
        }
    }
    return '';
}
?>
