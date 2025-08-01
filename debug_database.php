<?php
include 'includes/koneksi.php';

echo "<h2>Debug Database</h2>";

// Cek koneksi
if ($koneksi) {
    echo "<p style='color: green;'>✓ Koneksi database berhasil</p>";
} else {
    echo "<p style='color: red;'>✗ Koneksi database gagal</p>";
    exit;
}

// Cek apakah tabel berita ada
$result = mysqli_query($koneksi, "SHOW TABLES LIKE 'berita'");
if (mysqli_num_rows($result) > 0) {
    echo "<p style='color: green;'>✓ Tabel 'berita' ditemukan</p>";
} else {
    echo "<p style='color: red;'>✗ Tabel 'berita' tidak ditemukan</p>";
    exit;
}

// Cek struktur tabel berita
echo "<h3>Struktur Tabel Berita:</h3>";
$result = mysqli_query($koneksi, "DESCRIBE berita");
if ($result) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red;'>Error: " . mysqli_error($koneksi) . "</p>";
}

// Cek data berita
echo "<h3>Data Berita:</h3>";
$result = mysqli_query($koneksi, "SELECT * FROM berita LIMIT 5");
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        $first = true;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($first) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $first = false;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars(substr($value, 0, 50)) . (strlen($value) > 50 ? '...' : '') . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>Tabel berita kosong</p>";
    }
} else {
    echo "<p style='color: red;'>Error: " . mysqli_error($koneksi) . "</p>";
}

// Cek query yang digunakan di index.php dan berita.php
echo "<h3>Test Query:</h3>";
$result = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");
if ($result) {
    echo "<p style='color: green;'>✓ Query berhasil dieksekusi</p>";
    echo "<p>Jumlah baris: " . mysqli_num_rows($result) . "</p>";
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<h4>Contoh data pertama:</h4>";
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
} else {
    echo "<p style='color: red;'>✗ Query gagal: " . mysqli_error($koneksi) . "</p>";
}

mysqli_close($koneksi);
?> 