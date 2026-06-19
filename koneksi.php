<?php
// File: koneksi/database.php
// file ,

$host = 'localhost';
// PASTIKAN MENGGANTI 'NamaLengkap' SESUAI DENGAN NAMA DATABASE ANDA DI TAHAP 1
$dbname = 'DB_SIMULASI_PBO_TRPL 1A _Dwita Listanti'; 
$username = 'root'; // Default XAMPP/Laragon
$password = '';     // Default XAMPP/Laragon kosong

try {
    // Membuat instance PDO untuk koneksi
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set mode error PDO ke Exception agar mudah menangkap pesan error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Mematikan eksekusi dan menampilkan pesan jika koneksi gagal
    die("Koneksi Database Gagal: " . $e->getMessage());
}
?>