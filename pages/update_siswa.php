<?php
include "../config/database.php";

$id = $_POST['id'];
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];

mysqli_query($conn, "UPDATE siswa SET 
nisn='$nisn',
nama='$nama',
tgl_lahir='$tgl',
jurusan='$jurusan',
email='$email'
WHERE id='$id'");

header("Location: siswa.php");
exit;