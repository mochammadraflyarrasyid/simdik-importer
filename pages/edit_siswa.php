<?php
include "../config/database.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Siswa</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    box-sizing: border-box;
}

body {
    font-family:'Poppins',sans-serif;
    background: linear-gradient(135deg,#3b82f6,#1e3a8a);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:0;
}

/* CARD */
.card {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    padding:30px;
    border-radius:20px;
    width:350px;
    color:white;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    animation:fadeIn 0.6s ease;
}

@keyframes fadeIn {
    from {opacity:0; transform:translateY(20px);}
    to {opacity:1;}
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
    border:none;
    border-radius:10px;
    outline:none;
    font-family:'Poppins',sans-serif;
}

/* BUTTON */
button {
    width:100%;
    padding:12px;
    margin-top:10px;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    border:none;
    border-radius:10px;
    color:white;
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
<h2>✏️ Edit Siswa</h2>

<form action="update_siswa.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<input type="text" name="nisn" value="<?= $row['nisn'] ?>" placeholder="NISN">
<input type="text" name="nama" value="<?= $row['nama'] ?>" placeholder="Nama">
<input type="date" name="tgl" value="<?= $row['tgl_lahir'] ?>">
<input type="text" name="jurusan" value="<?= $row['jurusan'] ?>" placeholder="Jurusan">
<input type="email" name="email" value="<?= $row['email'] ?>" placeholder="Email">

<button type="submit">Update Data</button>
</form>

</div>

</body>
</html>