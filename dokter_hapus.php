<?php
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM dokter WHERE id_dokter = '$id'");

if ($hapus) {
    echo "<script>alert('Data Dokter Berhasil Dihapus'); window.location='dokter.php';</script>";
}
?>