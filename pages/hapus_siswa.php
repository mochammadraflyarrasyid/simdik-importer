<?php
include "../config/database.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");

echo "<script>
alert('Data berhasil dihapus!');
window.location.href='siswa.php';
</script>";
?>