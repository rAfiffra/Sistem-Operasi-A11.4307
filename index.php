<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input Data Tamu</title>

    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">

</head>

<body>

    
<h1
 
class="text-center">Daftar Tamu</h1>
    <form action="index.php" method="post" class="container">
        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2">
        <input type="text" name="alamat" placeholder="Alamat" class="form-control mb-2">
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</body>
</html>
<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_so");

// Proses input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    // Query insert data
    $sql = "INSERT INTO tb_data (nama, alamat) VALUES ('$nama', '$alamat')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data berhasil diinput!";
    } else {
        echo "Data gagal diinput!";
    }
}
?>
<style type="text/css">