<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>CRUD Data Pasien Klinik</h2>

<input type="text" id="search" placeholder="Cari pasien...">

<br><br>

<a href="add.php">+ Tambah Pasien</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nama</th>
            <th>No RM</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="result">
        <!-- Data pasien akan dimasukkan melalui AJAX -->
    </tbody>
</table>

<br>

<div id="pagination"></div>

<script src="script.js"></script>

</body>
</html>
