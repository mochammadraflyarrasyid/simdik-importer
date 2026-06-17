<?php

session_start();

include "../config/database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$data = $_SESSION['data_import'] ?? [];

$nama_file = $_SESSION['nama_file'] ?? 'unknown.csv';

$berhasil = 0;
$error = 0;

// Kalau session kosong
if(empty($data)){

    die("Data import kosong");

}

foreach($data as $d){

    $nisn = mysqli_real_escape_string($conn, $d['nisn']);
    $nama = mysqli_real_escape_string($conn, $d['nama']);
    $jurusan = mysqli_real_escape_string($conn, $d['jurusan']);
    $email = mysqli_real_escape_string($conn, $d['email']);

    $status = $d['status'];

    // Hitung statistik
    if($status == "VALID"){

        $berhasil++;

    } else {

        $error++;

    }

    // Simpan semua data
    $query = mysqli_query($conn,
    "INSERT INTO siswa
    (nisn,nama,tgl_lahir,jurusan,email,status_data)
    VALUES
    ('$nisn','$nama',NULL,'$jurusan','$email','$status')");

    if(!$query){

        die(mysqli_error($conn));

    }

}

// Total data
$jumlah_data = count($data);

// Tentukan status import
$status_import = "BERHASIL";

if($berhasil > 0 && $error > 0){

    $status_import = "BELUM LENGKAP";

}

if($berhasil == 0){

    $status_import = "GAGAL";

}

// Simpan laporan import
$simpan = mysqli_query($conn,
"INSERT INTO laporan
(nama_file,jumlah_data,berhasil,error,status_import,tanggal)
VALUES
('$nama_file','$jumlah_data','$berhasil','$error','$status_import',NOW())");

if(!$simpan){

    die(mysqli_error($conn));

}

// Hapus session
unset($_SESSION['data_import']);
unset($_SESSION['nama_file']);
unset($_SESSION['total_error']);

// Redirect
header("Location: /simdik-importer/pages/laporan.php");

exit();

?>