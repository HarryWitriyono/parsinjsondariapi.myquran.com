<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Id Kota Jadwal Sholat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
<?php
// URL dari sumber data JSON + post data namakota
$json_url = 'https://api.myquran.com/v1/sholat/kota/cari/'.$_POST['namakota'];
// Mendapatkan data JSON dari URL menggunakan cURL
$ch = curl_init($json_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($ch);
// Menutup koneksi cURL
curl_close($ch);
// Mengecek apakah pengambilan data JSON berhasil
if ($json_data === false) {
    die('Gagal mengambil data JSON');
}
// Melakukan parsing data JSON ke dalam bentuk array
$data = json_decode($json_data, true);
// Mengecek apakah parsing berhasil
if ($data === null) {
    die('Gagal mengurai data JSON');
}
if ((isset($data['message'])) and ($data['message']=="Kota tidak ketemu") and (empty($data['id']))) {
	echo '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Tidak ditemukan !</strong> Informasi kota tidak ditemukan.
  </div>';exit();
	}
// Menampilkan data yang telah diurai
echo 'Data kota yang ditemukan adalah :<br>';
foreach ($data['data'] as $kunci){
	if (! empty($kunci['id'])) {
	echo "Id Kota : ".$kunci['id'].'&nbsp;<a href="lihatjadwalsholatbulananperkota.php?id='.$kunci['id'].'" class="btn btn-success" formmethod="post">Lihat Jadwal</a><br>';
	echo "Nama Kota : ".$kunci['lokasi']."<br>";
	} else {
		echo '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Tidak ditemukan !</strong> Informasi kota tidak ditemukan.
  </div>';exit();
	}
}
?>