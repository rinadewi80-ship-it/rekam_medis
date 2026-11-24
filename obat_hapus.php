<?php
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM obat WHERE id_obat = '$id'");

if ($hapus) {
    echo "<script>alert('Data Obat Berhasil Dihapus'); window.location='obat.php';</script>";
}
?>