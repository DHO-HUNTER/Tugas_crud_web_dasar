<?php
include 'koneksi.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    // Menyiapkan query untuk memasukkan data
    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES ('$nama', '$nim', '$jurusan', '$email')";
    
    // Mengeksekusi query dan mengecek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Menampilkan error jika ada
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="ehe.css">
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br>
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Tambah Data">
    </form>
    <br>
    <a href="index.php" class="hallo">Kembali ke Halaman Utama</a>
</body>
</html>