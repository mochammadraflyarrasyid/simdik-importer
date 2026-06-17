<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Upload CSV - SIMDIK IMPORTER</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#071029;
    overflow-x:hidden;
}

/* Sidebar */

.sidebar{
    width:270px;
    height:100vh;
    position:fixed;
    background:linear-gradient(180deg,#0f172a,#111827);
    padding:30px 20px;
    box-shadow:5px 0 30px rgba(0,0,0,0.3);
}

.logo{
    color:white;
    font-size:30px;
    font-weight:700;
    text-align:center;
    margin-bottom:45px;
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
    font-size:15px;
    font-weight:500;
}

.menu a:hover,
.menu a.active{
    background:linear-gradient(135deg,#3b82f6,#8b5cf6);
    transform:translateX(5px);
}

/* Main */

.main-content{
    margin-left:270px;
    padding:35px;
}

.topbar h1{
    color:white;
    font-size:52px;
    font-weight:700;
    margin-bottom:5px;
}

.topbar p{
    color:#94a3b8;
    margin-bottom:35px;
}

/* Upload Card */

.upload-card{
    background:rgba(255,255,255,0.08);
    border-radius:30px;
    padding:50px;
    border:1px solid rgba(255,255,255,0.08);
    backdrop-filter:blur(14px);
}

.drop-area{
    border:2px dashed rgba(255,255,255,0.15);
    border-radius:25px;
    padding:70px 40px;
    text-align:center;
}

.upload-icon{
    font-size:90px;
    color:#60a5fa;
    margin-bottom:20px;
}

.drop-area h3{
    color:white;
    font-weight:600;
    margin-bottom:10px;
}

.drop-area p{
    color:#94a3b8;
    margin-bottom:25px;
}

.form-control{
    height:55px;
    border-radius:16px;
    background:rgba(255,255,255,0.08);
    border:none;
    color:white;
    padding:14px;
}

.form-control::file-selector-button{
    border:none;
    background:linear-gradient(135deg,#3b82f6,#8b5cf6);
    color:white;
    padding:10px 18px;
    border-radius:12px;
    margin-right:15px;
}

.btn-upload{
    width:100%;
    height:58px;
    border:none;
    border-radius:16px;
    margin-top:25px;
    background:linear-gradient(135deg,#3b82f6,#8b5cf6);
    color:white;
    font-size:16px;
    font-weight:600;
    transition:0.3s;
}

.btn-upload:hover{
    transform:translateY(-3px);
}

.info-card{
    margin-top:30px;
    background:rgba(255,255,255,0.05);
    border-radius:20px;
    padding:25px;
    color:white;
}

.info-list{
    color:#cbd5e1;
    line-height:2;
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

        <a href="upload.php" class="active">
            <i class="bi bi-upload"></i>
            Upload CSV
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

<div class="main-content">

    <div class="topbar">

        <h1>Upload CSV</h1>

        <p>
            Upload file CSV data siswa untuk diimport ke database
        </p>

    </div>

    <div class="upload-card">

        <div class="drop-area">

            <div class="upload-icon">
                <i class="bi bi-cloud-arrow-up-fill"></i>
            </div>

            <h3>Upload File CSV</h3>

            <p>
                Format file: .csv
            </p>

            <!-- FIX PATH -->

            <form action="/simdik-importer/pages/proses_upload.php"
                  method="POST"
                  enctype="multipart/form-data">

                <input type="file"
                       name="file_excel"
                       class="form-control"
                       accept=".csv"
                       required>

                <button type="submit" class="btn-upload">

                    <i class="bi bi-upload"></i>

                    Upload Sekarang

                </button>

            </form>

        </div>

        <div class="info-card">

            <div class="info-list">

                • Format file yang didukung: .csv
                <br>

                • Sistem otomatis validasi email
                <br>

                • Sistem otomatis skip data kosong
                <br>

                • Sistem otomatis cegah NISN duplikat

            </div>

        </div>

    </div>

</div>

</body>
</html>