<?php
$host = "localhost";
$port = "5432";
$dbname = "crud_pasien";
$user = "postgres";      
$password = "123";       

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi PostgreSQL gagal: " . $e->getMessage());
}
?>
