<?php
include "../config/database.php";

mysqli_query($conn, "TRUNCATE TABLE siswa");

echo "<script>
alert('Semua data siswa berhasil dihapus!');
window.location.href='siswa.php';
</script>";
?>