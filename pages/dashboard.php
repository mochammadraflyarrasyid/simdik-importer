<?php

session_start();

include "../config/database.php";

// TOTAL SISWA
$total_siswa = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM siswa")
);

// TOTAL IMPORT
$total_import = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM laporan")
);

// TOTAL ADMIN
$total_admin = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM admin")
);

// PERSEN VALID
$valid = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total
FROM siswa
WHERE status_data='VALID'")
);

$all = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total
FROM siswa")
);

$persen = 0;

if($all['total'] > 0){

    $persen = round(
    ($valid['total'] / $all['total']) * 100
    );

}

// AKTIVITAS TERBARU
$aktivitas = mysqli_query($conn,
"SELECT * FROM laporan
ORDER BY id DESC
LIMIT 5");

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

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

.menu-title{
    color:#94a3b8;
    font-size:14px;
    margin-bottom:20px;
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

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.title{
    color:white;
    font-size:55px;
    font-weight:700;
}

.subtitle{
    color:#94a3b8;
}

.admin-box{
    background:rgba(255,255,255,0.08);
    padding:15px 20px;
    border-radius:20px;
    color:white;
    font-weight:600;
}

.card-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:25px;
    margin-top:40px;
}

.card-box{
    background:rgba(255,255,255,0.08);
    padding:35px;
    border-radius:28px;
}

.icon-box{
    width:80px;
    height:80px;
    border-radius:24px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:35px;
    margin-bottom:25px;
}

.blue{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
}

.purple{
    background:linear-gradient(135deg,#8b5cf6,#7c3aed);
}

.green{
    background:linear-gradient(135deg,#10b981,#059669);
}

.orange{
    background:linear-gradient(135deg,#f59e0b,#d97706);
}

.card-title{
    color:#cbd5e1;
    font-size:18px;
}

.card-value{
    color:white;
    font-size:55px;
    font-weight:700;
}

.activity-box{
    background:rgba(255,255,255,0.08);
    border-radius:30px;
    padding:30px;
    margin-top:40px;
}

.activity-title{
    color:white;
    font-size:26px;
    font-weight:700;
    margin-bottom:30px;
}

table{
    width:100%;
}

th{
    color:#cbd5e1;
    padding:15px;
}

td{
    color:white;
    padding:18px 15px;
    border-top:1px solid rgba(255,255,255,0.08);
}

.file-link{
    color:white;
    text-decoration:none;
    font-weight:600;
}

.file-link:hover{
    color:#60a5fa;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">
SIMDIK <span>IMPORTER</span>
</div>

<div class="menu-title">
MAIN MENU
</div>

<div class="menu">

<a href="dashboard.php" class="active">
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

<a href="laporan.php">
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

<div class="header">

<div>

<div class="title">
Dashboard
</div>

<div class="subtitle">
Selamat datang di SIMDIK IMPORTER
</div>

</div>

<div class="admin-box">
<i class="bi bi-person-circle"></i>
Admin
</div>

</div>

<div class="card-grid">

<div class="card-box">

<div class="icon-box blue">
<i class="bi bi-people-fill"></i>
</div>

<div class="card-title">
Total Siswa
</div>

<div class="card-value">
<?php echo $total_siswa; ?>
</div>

</div>

<div class="card-box">

<div class="icon-box purple">
<i class="bi bi-upload"></i>
</div>

<div class="card-title">
Total Import
</div>

<div class="card-value">
<?php echo $total_import; ?>
</div>

</div>

<div class="card-box">

<div class="icon-box green">
<i class="bi bi-check-circle-fill"></i>
</div>

<div class="card-title">
Data Valid
</div>

<div class="card-value">
<?php echo $persen; ?>%
</div>

</div>

<div class="card-box">

<div class="icon-box orange">
<i class="bi bi-person-badge-fill"></i>
</div>

<div class="card-title">
Total Admin
</div>

<div class="card-value">
<?php echo $total_admin; ?>
</div>

</div>

</div>

<div class="activity-box">

<div class="activity-title">
Aktivitas Import Terbaru
</div>

<table>

<tr>

<th>No</th>
<th>Nama File</th>
<th>Tanggal</th>
<th>Status</th>

</tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($aktivitas)){

$status = strtoupper($d['status_import'] ?? '');

if($status == ''){
    $status = 'BERHASIL';
}

?>

<tr>

<td><?php echo $no++; ?></td>

<td>

<a class="file-link"
href="detail_import.php?file=<?php echo $d['nama_file']; ?>">

<?php echo $d['nama_file']; ?>

</a>

</td>

<td>

<?php echo date('d M Y',
strtotime($d['tanggal'])); ?>

</td>

<td>

<?php if($status == "BERHASIL"){ ?>

<span style="
background:#10b981;
color:white;
padding:12px 24px;
border-radius:30px;
font-weight:700;
display:inline-block;
min-width:170px;
text-align:center;
">

BERHASIL

</span>

<?php } ?>

<?php if($status == "BELUM LENGKAP"){ ?>

<span style="
background:#f59e0b;
color:white;
padding:12px 24px;
border-radius:30px;
font-weight:700;
display:inline-block;
min-width:170px;
text-align:center;
">

BELUM LENGKAP

</span>

<?php } ?>

<?php if($status == "GAGAL"){ ?>

<span style="
background:#ef4444;
color:white;
padding:12px 24px;
border-radius:30px;
font-weight:700;
display:inline-block;
min-width:170px;
text-align:center;
">

GAGAL

</span>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>