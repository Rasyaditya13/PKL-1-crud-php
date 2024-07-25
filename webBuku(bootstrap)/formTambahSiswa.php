<?php
include 'koneksi.php';

if (isset($_POST['proses'])){
    $id_siswa = $_POST["id_siswa"];
    $nama_siswa = $_POST["nama_siswa"];
    $kelas_siswa = $_POST["kelas_siswa"];
    $jurusan = $_POST["jurusan_siswa"];

    $cekId = "SELECT * FROM  tb_siswa WHERE id_siswa = $id_siswa";
    $hasilCek= mysqli_query($koneksi, $cekId);

    if (mysqli_num_rows($hasilCek) > 0) {
        echo "<script>alert('ID siswa sudah digunakan, silakan gunakan ID yang lain.'); window.location.href = '#';</script>";

    }else{
        $query = "INSERT INTO tb_siswa (id_siswa, nama_siswa, kelas_siswa, jurusan) VALUES ('$id_siswa', '$nama_siswa', '$kelas_siswa', '$jurusan')";
        mysqli_query($koneksi, $query);

        header('Location: pageSiswa.php');
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create Data Siswa</title>

</head>
<body>
    <h1>Tambah Data Siswa</h1>


    <div class="form-container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="id_siswa"  class="form-label">ID siswa:</label>
                <input type="text"  class="form-control" name="id_siswa" value="" required>
            </div>
 
            <div class="mb-3">
                <label for="nama_siswa"  class="form-label">Nama siswa:</label>
                <input type="text"  class="form-control" name="nama_siswa" value="" required>
            </div>

            <div class="mb-3">
                <label for="kelas_siswa"  class="form-label">Kelas siswa:</label>
        <input type="text"  class="form-control" name="kelas_siswa" value="" required>
            </div>
 
            <div class="mb-3">
                <label class="form-label" for="jurusan_siswa">Jurusan siswa:</label>
        <input class="form-control" type="text" name="jurusan_siswa" value="" required> 
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