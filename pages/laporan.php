<?php

session_start();

include "../config/database.php";

$data = mysqli_query($conn,
"SELECT * FROM laporan
ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Laporan Import</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#071029;
}

.sidebar{
    width:270px;
    height:100vh;
    position:fixed;
    background:linear-gradient(180deg,#0f172a,#111827);
    padding:30px 20px;
}

.logo{
    color:white;
    font-size:32px;
    font-weight:700;
    margin-bottom:50px;
}

.logo span{
    color:#60a5fa;
}

.menu a{
    display:flex;
    align-items:center;
    gap:14px;
    text-decoration:none;
    color:#e2e8f0;
    padding:15px 18px;
    border-radius:16px;
    margin-bottom:12px;
    transition:0.3s;
}

.menu a:hover,
.menu a.active{
    background:linear-gradient(135deg,#3b82f6,#8b5cf6);
}

.main{
    margin-left:270px;
    padding:35px;
}

.title{
    color:white;
    font-size:55px;
    font-weight:700;
}

.subtitle{
    color:#94a3b8;
    margin-bottom:40px;
}

.card-box{
    background:rgba(255,255,255,0.08);
    border-radius:30px;
    padding:30px;
    margin-bottom:25px;
}

.file-name{
    color:white;
    font-size:22px;
    font-weight:700;
    text-decoration:none;
}

.file-name:hover{
    color:#60a5fa;
}

.info{
    color:#cbd5e1;
    margin-top:10px;
    font-size:18px;
}

.date{
    color:#94a3b8;
    margin-top:20px;
}

.status{
    margin-top:20px;
    display:inline-block;
    padding:12px 24px;
    border-radius:30px;
    color:white;
    font-weight:700;
    min-width:180px;
    text-align:center;
}

.success{
    background:#10b981;
}

.warning{
    background:#f59e0b;
}

.danger{
    background:#ef4444;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">
SIMDIK <span>IMPORTER</span>
</div>

<div class="menu">

<a href="dashboard.php">
<i class="bi bi-grid-fill"></i>
Dashboard
</a>

<a href="upload.php">
<i class="bi bi-upload"></i>
Upload Excel
</a>

<a href="siswa.php">
<i class="bi bi-people-fill"></i>
Data Siswa
</a>

<a href="laporan.php" class="active">
<i class="bi bi-file-earmark-bar-graph-fill"></i>
Laporan Import
</a>

<a href="../login.php">
<i class="bi bi-box-arrow-left"></i>
Logout
</a>

</div>

</div>

<div class="main">

<div class="title">
Laporan Import
</div>

<div class="subtitle">
Riwayat hasil import data siswa
</div>

<?php while($d = mysqli_fetch_array($data)){

$status = strtoupper($d['status_import'] ?? '');

if($status == ''){
    $status = 'BERHASIL';
}

$class = "success";

if($status == "BELUM LENGKAP"){
    $class = "warning";
}

if($status == "GAGAL"){
    $class = "danger";
}

?>

<div class="card-box">

<a class="file-name"
href="detail_import.php?file=<?php echo $d['nama_file']; ?>">

<i class="bi bi-file-earmark-spreadsheet"></i>

<?php echo $d['nama_file']; ?>

</a>

<div class="info">

Total Data:
<?php echo $d['jumlah_data']; ?>

|

Valid:
<?php echo $d['berhasil']; ?>

|

Error:
<?php echo $d['error']; ?>

</div>

<div class="date">

<?php echo $d['tanggal']; ?>

</div>

<div class="status <?php echo $class; ?>">

<?php echo $status; ?>

</div>

</div>

<?php } ?>

</div>

</body>
</html>