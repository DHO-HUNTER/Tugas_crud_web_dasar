<?php
include 'koneksi.php'; // Menghubungkan ke database

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Proses penghapusan data
    $sql = "DELETE FROM mahasiswa WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Menampilkan error jika ada
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}
?>