<?php
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Siswa</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    box-sizing: border-box;
}

body {
    font-family:'Poppins',sans-serif;
    background: linear-gradient(135deg,#6366f1,#1e3a8a);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:0;
}

/* CARD */
.card {
    background:white;
    padding:30px;
    border-radius:20px;
    width:350px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2 {
    text-align:center;
    margin-bottom:20px;
}

/* INPUT */
input {
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:10px;
    border:1px solid #ddd;
    outline:none;
}

/* BUTTON */
button {
    width:100%;
    padding:12px;
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    border:none;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover {
    transform:scale(1.05);
}
</style>
</head>

<body>

<div class="card">
<h2>➕ Tambah Siswa</h2>

<form action="simpan_siswa.php" method="POST">

<input type="text" name="nisn" placeholder="NISN" required>
<input type="text" name="nama" placeholder="Nama" required>
<input type="date" name="tgl" required>
<input type="text" name="jurusan" placeholder="Jurusan" required>
<input type="email" name="email" placeholder="Email" required>

<button type="submit">Simpan</button>
</form>

</div>

</body>
</html>