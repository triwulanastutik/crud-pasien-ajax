<?php
include 'db.php';

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

$where = "";
$params = [];

if (!empty($keyword)) {
    $where = " WHERE nama_pasien ILIKE ? 
               OR no_rekam_medis ILIKE ? ";
    $params[] = "%$keyword%";
    $params[] = "%$keyword%";
}

/* Ambil data untuk halaman aktif */
$sql = "SELECT * FROM pasien $where 
        ORDER BY id DESC 
        LIMIT $limit OFFSET $start";

$stmt = $conn->prepare($sql);
$stmt->execute($params);

$data = "";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data .= "<tr>
        <td>{$row['nama_pasien']}</td>
        <td>{$row['no_rekam_medis']}</td>
        <td>{$row['jenis_kelamin']}</td>
        <td>{$row['tanggal_lahir']}</td>
        <td>{$row['alamat']}</td>
        <td>
            <a class='edit' href='edit.php?id={$row['id']}'>Edit</a> | 
            <a class='hapus' href='delete.php?id={$row['id']}' 
               onclick='return confirm(\"Hapus data?\")'>Hapus</a>
        </td>
    </tr>";
}

/* Hitung total data SESUAI SEARCH */
$countSql = "SELECT COUNT(*) FROM pasien $where";
$countStmt = $conn->prepare($countSql);
$countStmt->execute($params);
$totalData = $countStmt->fetchColumn();

$totalPage = ceil($totalData / $limit);

/* Buat tombol pagination */
$pagination = "";
for ($i = 1; $i <= $totalPage; $i++) {
    $pagination .= "<a href='javascript:void(0)' onclick='goPage($i)'>$i</a> ";
}

echo json_encode([
    "data" => $data,
    "pagination" => $pagination
]);
