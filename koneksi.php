<?php

// Koneksi ke database
// user:DHO-HUNTER
// pass:mydatabaseEhe

$host = "localhost"; // Ganti dengan host database Anda
$user = "DHO-HUNTER"; // Ganti dengan username database Anda
$password = "mydatabaseEhe"; // Ganti dengan password database Anda
$dbname = "mahasiswa";

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal ,sumimasen :( : " . $conn->connect_error);
}
?>