<?php if(!isset($title)) $title = "SIMDIK"; ?>

<!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    margin:0;
    font-family:'Poppins', sans-serif;
    background:#f4f7fb;
}

/* LOGO */
body::before {
    content:"";
    position:fixed;
    width:500px;
    height:500px;
    background:url('../logo.png') center no-repeat;
    background-size:contain;
    opacity:0.05;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}

/* Sidebar */
.sidebar {
    width:220px;
    height:100vh;
    background:#1e3a8a;
    color:white;
    position:fixed;
    padding:20px;
}

.sidebar a {
    display:block;
    color:white;
    text-decoration:none;
    margin:10px 0;
}

/* Main */
.main {
    margin-left:240px;
    padding:20px;
}

.card {
    background:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}
</style>
</head>

<body>

<div class="sidebar">
<h2>SIMDIK</h2>
<a href="dashboard.php">Dashboard</a>
<a href="siswa.php">Data Siswa</a>
<a href="upload.php">Upload</a>
<a href="laporan.php">Laporan</a>
</div>

<div class="main">