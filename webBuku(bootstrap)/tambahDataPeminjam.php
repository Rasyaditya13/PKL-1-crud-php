<?php
include 'koneksi.php';
include 'fungsi.php';

$sql_siswa = "SELECT id_siswa, nama_siswa FROM tb_siswa";
$result_siswa = $koneksi->query($sql_siswa);

$sql_buku = "SELECT id_buku, nama_buku FROM tb_buku";
$result_buku = $koneksi->query($sql_buku);

if (isset($_POST["submit"])) {
    $id_siswa = $_POST["idSiswa"];
    $id_buku = $_POST["idBuku"];
    $tanggal = $_POST["tgl_pinjam"];
    $tanggal = date('Y-m-d', strtotime($tanggal));

    $query = "INSERT INTO peminjam (id_siswa, id_buku, tgl_pinjam) VALUES ('$id_siswa', '$id_buku', '$tanggal')";

    mysqli_query($koneksi, $query);
    header('Location: pagePeminjaman.php');
    exit();
}

$tgl_realtime = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Data Peminjam</title>

</head>
<body>
    <h1>Tambah Data Peminjam</h1>
    <div class="form-container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="siswa" class="form-label">Pilih Nama Siswa:</label>
                <select class="form-control" name="idSiswa" id="siswa">
                    <?php
                    if ($result_siswa->num_rows > 0) {
                        while ($row = $result_siswa->fetch_assoc()) {
                            echo "<option value='" . $row['id_siswa'] . "'>" . $row['nama_siswa'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="buku" class="form-label">Pilih Nama Buku:</label>
                <select class="form-control" name="idBuku" id="buku">
                    <?php
                    if ($result_buku->num_rows > 0) {
                        while ($row = $result_buku->fetch_assoc()) {
                            echo "<option value='" . $row['id_buku'] . "'>" . $row['nama_buku'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Masukan Tanggal:</label>
                <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $tgl_realtime; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambahkan Data</button>
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