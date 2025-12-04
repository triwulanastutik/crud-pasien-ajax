<?php
include "db.php";

$keyword = $_GET['keyword'];

$data = $conn->query("SELECT * FROM pasien 
WHERE nama_pasien LIKE '%$keyword%' 
OR no_rekam_medis LIKE '%$keyword%'
ORDER BY id DESC");

while ($row = $data->fetch_assoc()) {
?>
<tr>
    <td><?= $row['nama_pasien'] ?></td>
    <td><?= $row['no_rekam_medis'] ?></td>
    <td><?= $row['jenis_kelamin'] ?></td>
    <td><?= $row['tanggal_lahir'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
        <a href="delete.php?id=<?= $row['id'] ?>" 
           onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php } ?>
