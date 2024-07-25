<?php
include 'koneksi.php';

//delete
function delete_data($tabel, $kolom, $id) {
    global $koneksi;
    $query = "DELETE FROM $tabel WHERE $kolom ='$id'";
    mysqli_query($koneksi, $query);


  
}

//update SISWA
function update_data_s($id_siswa, $nama_siswa, $kelas_siswa, $jurusan_siswa) {
    global $koneksi;

    $query = "UPDATE tb_siswa SET 
        nama_siswa = '$nama_siswa', 
        kelas_siswa = '$kelas_siswa', 
        jurusan = '$jurusan_siswa' 
        WHERE id_siswa = '$id_siswa'";

    mysqli_query($koneksi, $query);
}

//update BUKU
function update_data_b($id_buku, $nama_buku, $genre_buku, $tahun_terbit) {
    global $koneksi;

    $query = "UPDATE tb_buku SET 
        nama_buku = '$nama_buku', 
        genre_buku = '$genre_buku', 
        tahun_terbit = '$tahun_terbit' 
        WHERE id_buku = '$id_buku'";

    mysqli_query($koneksi, $query);
}

//update PEMINJAM
function update_data_p ($id_pinjam, $id_siswa, $id_buku, $tgl_pinjam){
    global $koneksi;

    $query = "UPDATE peminjam SET
        id_siswa = '$id_siswa', 
        id_buku = '$id_buku', 
        tgl_pinjam = '$tgl_pinjam' 
        WHERE id_pinjam = '$id_pinjam'
    ";

    mysqli_query($koneksi, $query);
}

//create PEMINJAM
function create_data($id_siswa, $id_buku, $tanggal){
    global $koneksi;

    $query = "INSERT INTO peminjam
        id_siswa = '$id_siswa';
        id_buku = '$id_buku';
        tgl_pinjam = '$tanggal';
     ";

     mysqli_query($koneksi, $query);
     
}
?>
