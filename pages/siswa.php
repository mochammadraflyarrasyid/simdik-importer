<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit();
}

include "../config/database.php";

$query = mysqli_query($conn, "SELECT * FROM siswa");
$total = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Siswa - SIMDIK IMPORTER</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    background: #071029;
    margin: 0;
    overflow-x: hidden;
}

/* Sidebar */

.sidebar{
    width: 270px;
    height: 100vh;
    position: fixed;
    background: linear-gradient(180deg, #0f172a, #111827);
    padding: 30px 20px;
    box-shadow: 5px 0 30px rgba(0,0,0,0.3);
}

.logo{
    color: white;
    font-size: 30px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 45px;
}

.logo span{
    color: #60a5fa;
}

.menu a{
    display: flex;
    align-items: center;
    gap: 14px;
    text-decoration: none;
    color: #e2e8f0;
    padding: 15px 18px;
    border-radius: 16px;
    margin-bottom: 12px;
    transition: 0.3s;
    font-size: 15px;
    font-weight: 500;
}

.menu a:hover,
.menu a.active{
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    transform: translateX(5px);
}

/* Main */

.main-content{
    margin-left: 270px;
    padding: 35px;
}

.topbar h1{
    color: white;
    font-size: 52px;
    font-weight: 700;
    margin-bottom: 5px;
}

.topbar p{
    color: #94a3b8;
    margin-bottom: 35px;
}

/* Stats */

.stats-card{
    background: rgba(255,255,255,0.08);
    border-radius: 28px;
    padding: 30px;
    margin-bottom: 35px;
    color: white;
    border: 1px solid rgba(255,255,255,0.08);
    backdrop-filter: blur(14px);
}

.stats-icon{
    width: 80px;
    height: 80px;
    border-radius: 22px;
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 35px;
    margin-bottom: 18px;
}

.stats-card h5{
    color: #cbd5e1;
    margin-bottom: 10px;
}

.stats-card h1{
    font-size: 50px;
    font-weight: 700;
}

/* Table Card */

.table-card{
    background: rgba(255,255,255,0.08);
    border-radius: 28px;
    padding: 35px;
    border: 1px solid rgba(255,255,255,0.08);
    backdrop-filter: blur(14px);
}

/* Search */

.search-box{
    margin-bottom: 25px;
}

.search-box input{
    height: 55px;
    border-radius: 16px;
    border: none;
    background: rgba(255,255,255,0.08);
    color: white;
    padding-left: 20px;
}

.search-box input:focus{
    background: rgba(255,255,255,0.12);
    color: white;
    box-shadow: none;
}

.search-box input::placeholder{
    color: #94a3b8;
}

/* Table */

.table{
    color: white !important;
    margin-bottom: 0;
}

.table thead{
    background: rgba(255,255,255,0.04);
}

.table th{
    color: #cbd5e1 !important;
    border: none !important;
    padding: 22px !important;
    font-weight: 600;
    background: transparent !important;
}

.table td{
    color: white !important;
    border-top: 1px solid rgba(255,255,255,0.05) !important;
    padding: 22px !important;
    background: transparent !important;
}

.table tbody tr{
    transition: 0.3s;
    background: transparent !important;
}

.table tbody tr:hover{
    background: rgba(255,255,255,0.03) !important;
}

.table-responsive{
    border-radius: 18px;
    overflow: hidden;
}

/* Badge */

.badge-jurusan{
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
}

/* Empty */

.empty{
    text-align: center;
    padding: 60px;
    color: #94a3b8;
}

.empty i{
    font-size: 60px;
    margin-bottom: 18px;
}

/* Responsive */

@media(max-width: 991px){

    .sidebar{
        width: 100%;
        height: auto;
        position: relative;
    }

    .main-content{
        margin-left: 0;
    }

}

</style>

</head>
<body>

<!-- Sidebar -->

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

        <a href="siswa.php" class="active">
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

<!-- Main -->

<div class="main-content">

    <div class="topbar">

        <h1>Data Siswa</h1>

        <p>
            Menampilkan seluruh data siswa hasil import Excel
        </p>

    </div>

    <!-- Stats -->

    <div class="stats-card">

        <div class="stats-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <h5>Total Siswa</h5>

        <h1><?php echo $total; ?></h1>

    </div>

    <!-- Table -->

    <div class="table-card">

        <div class="search-box">

            <input type="text"
                   class="form-control"
                   placeholder="Cari data siswa...">

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                $no = 1;

                if(mysqli_num_rows($query) > 0){

                    while($row = mysqli_fetch_assoc($query)){

                ?>

                    <tr>

                        <td><?php echo $no++; ?></td>

                        <td>
                            <?php echo $row['nisn']; ?>
                        </td>

                        <td>
                            <?php echo $row['nama']; ?>
                        </td>

                        <td>

                            <span class="badge-jurusan">
                                <?php echo $row['jurusan']; ?>
                            </span>

                        </td>

                        <td>
                            <?php echo $row['email']; ?>
                        </td>

                    </tr>

                <?php

                    }

                } else {

                ?>

                    <tr>

                        <td colspan="5">

                            <div class="empty">

                                <i class="bi bi-database-fill-x"></i>

                                <br>

                                Belum ada data siswa.

                            </div>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>