<?php
include "db.php";

$id = $_GET['id'];

// Ambil data dengan PDO (BENAR)
$stmt = $conn->prepare("SELECT * FROM pasien WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $rm     = $_POST['rm'];
    $jk     = $_POST['jk'];
    $tgl    = $_POST['tgl'];
    $alamat = $_POST['alamat'];

    $update = $conn->prepare("UPDATE pasien SET 
        nama_pasien = ?,
        no_rekam_medis = ?,
        jenis_kelamin = ?,
        tanggal_lahir = ?,
        alamat = ?
        WHERE id = ?
    ");

    $update->execute([$nama, $rm, $jk, $tgl, $alamat, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-wrapper">
    <div class="card">
        <h2>Edit Data Pasien</h2>

        <form method="POST">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama_pasien'] ?>" required>

            <label>No Rekam Medis</label>
            <input type="text" name="rm" value="<?= $data['no_rekam_medis'] ?>" required>

            <label>Jenis Kelamin</label>
            <select name="jk" required>
                <option value="Laki-laki" <?= $data['jenis_kelamin']=="Laki-laki"?"selected":"" ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= $data['jenis_kelamin']=="Perempuan"?"selected":"" ?>>
                    Perempuan
                </option>
            </select>

            <label>Tanggal Lahir</label>
            <input type="date" name="tgl" value="<?= $data['tanggal_lahir'] ?>" required>

            <label>Alamat</label>
            <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

            <div class="btn-group">
                <button type="submit">Update</button>
                <a href="index.php" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
