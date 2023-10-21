<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Jadwal Sholat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
<?php
// URL dari sumber data JSON + post data namakota
$json_url = 'https://api.myquran.com/v1/sholat/jadwal/'.$_GET['id'].'/'.date('Y').'/'.date('m').'/'.date('d');//echo $json_url;
// Mendapatkan data JSON dari URL menggunakan cURL
$ch = curl_init($json_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json_data = curl_exec($ch);
// Menutup koneksi cURL
curl_close($ch);
// Mengecek apakah pengambilan data JSON berhasil
if ($json_data === false) {
    die('Gagal mengambil data JSON');
};//echo $json_data."<br>";
// Melakukan parsing data JSON ke dalam bentuk array
$data = json_decode($json_data, true);
// Mengecek apakah parsing berhasil
if ($data === null) {
    die('Gagal mengurai data JSON');
}
// Menampilkan data yang telah diurai
echo 'Jadwal sholat yang ditemukan adalah :<br>';
echo 'Status: ' . ($data['status'] ? 'true' : 'false') . '<br>';
echo 'ID: ' . $data['data']['id'] . '<br>';
echo 'Lokasi: ' . $data['data']['lokasi'] . '<br>';
echo 'Daerah: ' . $data['data']['daerah'] . '<br>';
echo 'Koordinat:<br>';
echo 'Latitude: ' . $data['data']['koordinat']['lat'] . '<br>';
echo 'Longitude: ' . $data['data']['koordinat']['lon'] . '<br>';
echo 'Tanggal: ' . $data['data']['jadwal']['tanggal'] . '<br>';
echo 'Waktu Imsak: ' . $data['data']['jadwal']['imsak'] . '<br>';
echo 'Waktu Subuh: ' . $data['data']['jadwal']['subuh'] . '<br>';
echo 'Waktu Terbit: ' . $data['data']['jadwal']['terbit'] . '<br>';
echo 'Waktu Dhuha: ' . $data['data']['jadwal']['dhuha'] . '<br>';
echo 'Waktu Dzuhur: ' . $data['data']['jadwal']['dzuhur'] . '<br>';
echo 'Waktu Ashar: ' . $data['data']['jadwal']['ashar'] . '<br>';
echo 'Waktu Maghrib: ' . $data['data']['jadwal']['maghrib'] . '<br>';
echo 'Waktu Isya: ' . $data['data']['jadwal']['isya'] . '<br>';
?>