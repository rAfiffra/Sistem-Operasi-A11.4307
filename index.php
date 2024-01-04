<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input Data Tamu</title>
</head>

<body>

    
<center><h1>Daftar Tamu</h1></center>
    <form action="index.php" method="post" class="container">
        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2">
        <input type="text" name="alamat" placeholder="Alamat" class="form-control mb-2">
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    <style type="text/css">
      body {
  background-color: #f5f5f5;
}

.container {
  width: 500px;
  margin: 0 auto;
}

.form-control {
  width: 100%;
  height: 40px;
  border-radius: 4px;
  padding: 10px 20px;
  border: 1px solid #ccc;
}

.btn {
  width: 100px;
  height: 40px;
  border-radius: 4px;
  color: #fff;
  background-color: #007bff;
  border: none;
}
    </style>

</body>

</html>



<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_so");

// Proses input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    // Validasi input data
    if (empty($nama)) {
        echo "<div class='alert alert-danger'>Nama harus diisi!</div>";
    } else if (empty($alamat)) {
        echo "<div class='alert alert-danger'>Alamat harus diisi!</div>";
    } else {
        // Query insert data
        $sql = "INSERT INTO tb_data (nama, alamat) VALUES ('$nama', '$alamat')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Data berhasil diinput!";
        } else {
            echo "Data gagal diinput!";
        }
    }
}
?>