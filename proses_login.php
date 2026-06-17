<?php
session_start();
include "config/database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

if($data && $password == $data['password']){
    $_SESSION['username'] = $username;
    header("Location: pages/dashboard.php");
    exit;
} else {
    header("Location: index.php?error=1");
    exit;
}