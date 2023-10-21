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
<h2>Pilih Kota Jadwal Sholat</h2>
  <p>Silahkan ketik nama kota yang dicari:</p>
  <form method="post" action="ambiljsonkota.php">
   <div class="input-group mb-2">
    <span class="input-group-text">Nama Kota :</span>
    <input type="text" class="form-control" name="namakota">
   </div>
   <button type="submit" name="bKota" class="btn btn-success" formtarget="frmhasil">Cari</button>
  </form>
</div>
<iframe name="frmhasil" src="" width="100%" height="400px"></iframe>
</body>
</html>