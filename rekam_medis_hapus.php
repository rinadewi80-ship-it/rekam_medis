<?php
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM rekam_medis WHERE id_rekam = '$id'");

if ($hapus) {
    echo "<script>alert('Rekam Medis Berhasil Dihapus'); window.location='rekam_medis.php';</script>";
}
?>