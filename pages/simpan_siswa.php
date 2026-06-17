<?php
include "../config/database.php";

$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];

// CEK DUPLIKAT NISN
$cek = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");

if(mysqli_num_rows($cek) > 0){
    echo "<script>
    alert('NISN sudah ada!');
    window.history.back();
    </script>";
    exit;
}

// SIMPAN
mysqli_query($conn, "INSERT INTO siswa (nisn,nama,tgl_lahir,jurusan,email)
VALUES ('$nisn','$nama','$tgl','$jurusan','$email')");

echo "<script>
alert('Data berhasil ditambahkan!');
window.location.href='siswa.php';
</script>";
?>