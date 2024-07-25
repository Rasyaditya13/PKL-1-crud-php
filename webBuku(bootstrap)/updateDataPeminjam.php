<?php
include 'koneksi.php';
include 'fungsi.php';

$siswa_result = mysqli_query($koneksi, "SELECT id_siswa, nama_siswa FROM tb_siswa");
$buku_result = mysqli_query($koneksi, "SELECT id_buku, nama_buku FROM tb_buku");

$sql = mysqli_query($koneksi,"SELECT * FROM peminjam WHERE id_pinjam = '$_GET[pinjam]'");
$data = mysqli_fetch_assoc($sql);

if (isset($_POST['proses'])){
    update_data_p($_GET['pinjam'], $_POST['id_siswa'], $_POST['id_buku'], $_POST['tgl_pinjam']);

    header("Location: pagePeminjaman.php");
    exit();
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Update Data Peminjam</title>
    
    </head>
    <body>
        <h1>Update Data Peminjam</h1>
        <div class="form-container">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_pinjam" class="form-label">ID Pinjam:</label>
                    <input type="text" class="form-control" name="id_pinjam" value="<?php echo $data['id_pinjam']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="siswa" class="form-label">Nama Siswa:</label>
                    <select class="form-control" name="id_siswa" id="siswa">
                        <?php
                        while ($siswa = mysqli_fetch_assoc($siswa_result)) {
                            $selected = $siswa['id_siswa'] == $data['id_siswa'] ? 'selected' : '';
                            echo "<option value='{$siswa['id_siswa']}' $selected> {$siswa['nama_siswa']} [</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="buku" class="form-label">Nama Buku:</label>
                    <select class="form-control" name="id_buku" id="buku">
                        <?php
                        while ($buku = mysqli_fetch_assoc($buku_result)) {
                            $selected = $buku['id_buku'] == $data['id_buku'] ? 'selected' : '';
                            echo "<option value='{$buku['id_buku']}' $selected>{$buku['nama_buku']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam:</label>
                    <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" readonly>
                </div>
                <button type="submit" class="btn btn-primary" name="proses">Update Data</button>
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