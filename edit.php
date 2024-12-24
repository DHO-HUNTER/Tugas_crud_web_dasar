<?php
include 'koneksi.php'; // Menghubungkan ke database

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data mahasiswa berdasarkan ID
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = $conn->query($sql);

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $mahasiswa = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    // Menyiapkan query untuk memperbarui data
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', email='$email' WHERE id=$id";
    
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
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="ehe.css">
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($mahasiswa['nama']); ?>" required><br>
        <label>NIM:</label><br>
        <input type="text" name="nim" value="<?php echo htmlspecialchars($mahasiswa['nim']); ?>" required><br>
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="<?php echo htmlspecialchars($mahasiswa['jurusan']); ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($mahasiswa['email']); ?>" required><br><br>
        <input type="submit" value="Update Data" class="edit">
    </form>
    <br>
    <a href="index.php" class="hallo">Kembali ke Halaman Utama</a>
</body>
</html>