<?php
include 'config/database.php';

$username = 'admin';
$password = 'adminMakarya2026';

// hash password
$hashPassword = password_hash($password, PASSWORD_DEFAULT);

// simpan ke tabel users
$query = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$hashPassword')");

if($query){
    echo "User admin berhasil dibuat!";
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>