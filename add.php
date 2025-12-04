<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $rm     = $_POST['rm'];
    $jk     = $_POST['jk'];
    $tgl    = $_POST['tgl'];
    $alamat = $_POST['alamat'];

    $insert = $conn->prepare("INSERT INTO pasien
        (nama_pasien, no_rekam_medis, jenis_kelamin, tanggal_lahir, alamat)
        VALUES (?, ?, ?, ?, ?)
    ");

    $insert->execute([$nama, $rm, $jk, $tgl, $alamat]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-wrapper">
    <div class="card">
        <h2>Tambah Data Pasien</h2>

        <form method="POST">
            <label>Nama Pasien</label>
            <input type="text" name="nama" required>

            <label>No Rekam Medis</label>
            <input type="text" name="rm" required>

            <label>Jenis Kelamin</label>
            <select name="jk" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label>Tanggal Lahir</label>
            <input type="date" name="tgl" required>

            <label>Alamat</label>
            <textarea name="alamat" rows="3" required></textarea>

            <div class="btn-group">
                <button type="submit">Simpan</button>
                <a href="index.php" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
