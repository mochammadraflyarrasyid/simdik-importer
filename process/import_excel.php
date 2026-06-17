<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "../config/database.php";

// Cek file upload
if(isset($_FILES['file_excel'])){

    $fileName = $_FILES['file_excel']['name'];
    $tmpName  = $_FILES['file_excel']['tmp_name'];

    // Ambil ekstensi file
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Validasi harus CSV
    if($extension != 'csv'){

        die("File harus format CSV");

    }

    // Buka file CSV
    $file = fopen($tmpName, "r");

    // Counter
    $no = 0;

    // Loop isi CSV
    while(($row = fgetcsv($file, 10000, ",")) !== FALSE){

        // Skip header
        if($no > 0){

            $nisn    = trim($row[0]);
            $nama    = trim($row[1]);
            $jurusan = trim($row[2]);
            $email   = trim($row[3]);

            // Skip data kosong
            if($nisn == "" || $nama == ""){
                continue;
            }

            // Validasi email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                continue;
            }

            // Cek duplikat NISN
            $cek = mysqli_query($conn,
            "SELECT * FROM siswa WHERE nisn='$nisn'");

            // Jika belum ada
            if(mysqli_num_rows($cek) == 0){

                mysqli_query($conn,
                "INSERT INTO siswa(nisn,nama,jurusan,email)
                VALUES('$nisn','$nama','$jurusan','$email')");

            }

        }

        $no++;

    }

    fclose($file);

    // Redirect
    header("Location: ../pages/siswa.php");

    exit();

} else {

    echo "File tidak ditemukan";

}

?>