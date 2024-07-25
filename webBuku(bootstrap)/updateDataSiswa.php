<?php
include 'koneksi.php';
include 'fungsi.php';

$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa ='$_GET[siswa]'");
$data = mysqli_fetch_assoc($sql);

if (isset($_POST['proses'])) {
    update_data_s($_GET['siswa'], $_POST['nama_siswa'], $_POST['kelas_siswa'], $_POST['jurusan_siswa']);

    header("Location: pageSiswa.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update Data Siswa</title>

</head>
<body>
    <h1>Update Data Siswa</h1>


    <div class="form-container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="id_siswa"  class="form-label">ID siswa:</label>
                <input type="text"  class="form-control" name="id_siswa" value="<?php echo ($data['id_siswa']);?>" readonly>
            </div>
 
            <div class="mb-3">
                <label for="nama_siswa"  class="form-label">Nama siswa:</label>
                <input type="text"  class="form-control" name="nama_siswa" value="<?php echo ($data['nama_siswa']);?>">
            </div>

            <div class="mb-3">
                <label for="kelas_siswa"  class="form-label">Kelas siswa:</label>
        <input type="text"  class="form-control" name="kelas_siswa" value="<?php echo ($data['kelas_siswa']);?>">
            </div>
 
            <div class="mb-3">
                <label class="form-label" for="jurusan_siswa">Jurusan siswa:</label>
        <input class="form-control" type="text" name="jurusan_siswa" value="<?php echo ($data['jurusan']);?>"> <br>
            </div>
 
           
            <button type="submit" class="btn btn-primary" name="proses">Edit Data</button>
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