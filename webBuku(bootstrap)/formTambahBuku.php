<?php
include 'koneksi.php';

if (isset($_POST['proses'])){
    $id_buku = $_POST["id_buku"];
    $nama_buku = $_POST["nama_buku"];
    $genre_buku = $_POST["genre_buku"];
    $tahun_terbit = $_POST["tahun_terbit"];

    $cekId = "SELECT * FROM  tb_buku WHERE id_buku = $id_buku";
    $hasilCek= mysqli_query($koneksi, $cekId);

    if (mysqli_num_rows($hasilCek) > 0) {
        echo "<script>alert('ID buku sudah digunakan, silakan gunakan ID yang lain.'); </script>";

    }else{
        $query = "INSERT INTO tb_buku (id_buku, nama_buku, genre_buku, tahun_terbit) VALUES ('$id_buku', '$nama_buku', '$genre_buku', '$tahun_terbit')";
        mysqli_query($koneksi, $query);

        header('Location: pageBuku.php');
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Data buku</title>
</head>
<body>
<h1>Tambah Data Buku</h1>


<div class="form-container">
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label for="id_buku">ID Buku:</label>
            <input class="form-control" type="text" name="id_buku" value="" required>
        </div>

        <div class="mb-3">
            <label   class="form-label for="nama_buku">Nama Buku:</label>
            <input class="form-control" type="text" name="nama_buku" value="" required> 
        </div>

        <div class="mb-3">
            <label  class="form-label for="genre_buku">Genre Buku:</label>
            <input class="form-control" type="text" name="genre_buku" value="" required> 
        </div>

        <div class="mb-3">
            <label  class="form-label for="tahun_terbit">Tahun Terbit:</label>
            <input class="form-control" type="text" name="tahun_terbit" value="" required>
        </div>
       
        <button type="submit" class="btn btn-primary" name="proses">Tambah Data</button>
    </form>
</div>
</body>
</html>


<style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column; 
            align-items: center;
            background-color: #f8f9fa; 
        }
        h1 {
            margin-top: 20px; 
            margin-bottom: 20px; 
        }
        .form-container {
            width: 100%;
            max-width: 650px; 
            padding: 20px;
            background-color: #ffffff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            border-radius: 10px; 
        }
    </style>