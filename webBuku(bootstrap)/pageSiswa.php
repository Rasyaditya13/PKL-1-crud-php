<?php
include 'koneksi.php';
include 'fungsi.php';

$sql_siswa = "SELECT id_siswa, nama_siswa, kelas_siswa, jurusan FROM tb_siswa";
$result_siswa = $koneksi->query($sql_siswa);

if (isset($_GET['siswa'])) {
    delete_data('tb_siswa', 'id_siswa', $_GET['siswa']);

    echo "<meta http-equiv=refresh content=1;URL='pageSiswa.php'>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">HEHEHE  </a>
                </div>
            </div>
            <ul class="sidebar-nav">
            <li class="sidebar-item">
                    <a href="pageSiswa.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Tabel Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pageBuku.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Tabel Buku</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pagePeminjaman.php" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Tabel Peminjaman</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <div class="main p-3">
            <div class="text-center">
                <h1>Data Siswa</h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th colspan="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($result_siswa->num_rows > 0) {
                    while ($row = $result_siswa->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["id_siswa"] . "</td>
                            <td>" . $row["nama_siswa"] . "</td>
                            <td>" . $row["kelas_siswa"] . "</td>
                            <td>" . $row["jurusan"] . "</td>

                            <td><a href='updateDataSiswa.php?siswa=$row[id_siswa]'><input type='button' value='Update'></a></td>
                            <td><a href='?siswa=$row[id_siswa]'><input type='button' value='Delete'></a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                }
                ?>
                </tbody>
            </table>
            <a class="btnCreate" href="formTambahSiswa.php">
            <input type="button" value="Create Data"></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
