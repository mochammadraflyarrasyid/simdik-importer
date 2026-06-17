<?php

session_start();

include "../config/database.php";

$nama_file = $_GET['file'] ?? '';

$query = mysqli_query($conn,
"SELECT * FROM detail_import
WHERE nama_file='$nama_file'
ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Import</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:#071029;
    color:white;
    padding:40px;
}

.title{
    font-size:45px;
    font-weight:700;
    margin-bottom:10px;
}

.subtitle{
    color:#94a3b8;
    margin-bottom:30px;
}

.table-box{
    background:rgba(255,255,255,0.08);
    padding:25px;
    border-radius:25px;
}

table{
    overflow:hidden;
    border-radius:15px;
}

.valid{
    background:#dcfce7 !important;
}

.error{
    background:#fee2e2 !important;
}

.duplikat{
    background:#fef3c7 !important;
}

.back-btn{
    display:inline-block;
    margin-bottom:30px;
    padding:12px 20px;
    background:linear-gradient(135deg,#3b82f6,#8b5cf6);
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:600;
}

</style>

</head>

<body>

<a href="laporan.php" class="back-btn">
← Kembali
</a>

<div class="title">
    Detail Import
</div>

<div class="subtitle">
    File:
    <?php echo $nama_file; ?>
</div>

<div class="table-box">

<table class="table table-bordered">

<tr>

<th>NISN</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Email</th>
<th>Status</th>

</tr>

<?php while($d = mysqli_fetch_array($query)){ ?>

<?php

$class = "valid";

if($d['status_data'] == "ERROR"){
    $class = "error";
}

if($d['status_data'] == "DUPLIKAT"){
    $class = "duplikat";
}

?>

<tr class="<?php echo $class; ?>">

<td><?php echo $d['nisn']; ?></td>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['jurusan']; ?></td>
<td><?php echo $d['email']; ?></td>
<td><?php echo $d['status_data']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>