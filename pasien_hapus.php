<?php
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM pasien WHERE id_pasien = '$id'");

if ($hapus) {
    echo "<script>alert('Data Pasien Berhasil Dihapus'); window.location='pasien.php';</script>";
}
?>