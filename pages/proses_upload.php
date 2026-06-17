<?php

session_start();

include "../config/database.php";

if(!isset($_FILES['file_excel'])){

    die("File tidak ditemukan");

}

$file = $_FILES['file_excel']['tmp_name'];

$nama_file = $_FILES['file_excel']['name'];

$_SESSION['nama_file'] = $nama_file;

$handle = fopen($file, "r");

$valid = 0;
$error = 0;

$data_valid = [];

?>

<!DOCTYPE html>
<html>
<head>

<title>Preview Import CSV</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:#071029;
    color:white;
    padding:30px;
}

.title{
    font-size:50px;
    font-weight:700;
    margin-bottom:30px;
}

.table-box{
    background:white;
    border-radius:20px;
    overflow:hidden;
}

table{
    margin:0;
}

.valid{
    background:#dcfce7 !important;
}

.error{
    background:#fee2e2 !important;
}

.summary{
    margin-top:25px;
    font-size:22px;
    font-weight:600;
}

.btn-import{
    margin-top:30px;
    padding:15px 25px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#3b82f6,#8b5cf6);
    color:white;
    font-weight:600;
    font-size:16px;
}

</style>

</head>

<body>

<div class="title">
    Preview Data CSV
</div>

<div class="table-box">

<table class="table table-bordered table-hover">

<tr>

<th>NISN</th>
<th>Nama</th>
<th>Tanggal</th>
<th>Jurusan</th>
<th>Email</th>
<th>Status</th>

</tr>

<?php

$rowIndex = 0;

while(($row = fgetcsv($handle, 1000, ",")) !== FALSE){

    // Skip header
    if($rowIndex == 0){

        $rowIndex++;
        continue;

    }

    $nisn = trim($row[0] ?? '');
    $nama = trim($row[1] ?? '');

    // FIX FORMAT CSV
    $jurusan = trim($row[2] ?? '');
    $email = trim($row[3] ?? '');

    // Tidak pakai tanggal
    $tgl = NULL;

    $status = "VALID";

    // Validasi kosong
    if(empty($nisn) || empty($nama)){

        $status = "ERROR";

    }

    // Validasi email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $status = "ERROR";

    }

    // Cek duplikat
    $cek = mysqli_query($conn,
    "SELECT * FROM siswa WHERE nisn='$nisn'");

    if(mysqli_num_rows($cek) > 0){

        $status = "DUPLIKAT";

    }

    // Hitung statistik
    if($status == "VALID"){

        $valid++;
        $class = "valid";

    } else {

        $error++;
        $class = "error";

    }

    // Simpan semua data
    $data_valid[] = [

        'nisn' => $nisn,
        'nama' => $nama,
        'tgl' => $tgl,
        'jurusan' => $jurusan,
        'email' => $email,
        'status' => $status

    ];

    echo "

    <tr class='$class'>

    <td>$nisn</td>
    <td>$nama</td>
    <td>-</td>
    <td>$jurusan</td>
    <td>$email</td>
    <td>$status</td>

    </tr>

    ";

    $rowIndex++;

}

fclose($handle);

// Simpan session
$_SESSION['data_import'] = $data_valid;
$_SESSION['total_error'] = $error;

?>

</table>

</div>

<div class="summary">

✅ Data Valid: <?php echo $valid; ?>
<br><br>

❌ Data Error: <?php echo $error; ?>

</div>

<form action="/simdik-importer/pages/import.php"
      method="POST">

<button type="submit" class="btn-import">

Import ke Database

</button>

</form>

</body>
</html>