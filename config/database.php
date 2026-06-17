<?php
$conn = mysqli_connect("localhost", "root", "", "simdik_importer");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>