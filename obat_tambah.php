<?php
include 'koneksi.php';
include 'header.php';

if (isset($_POST['simpan'])) {
    $nama_obat = $_POST['nama_obat'];
    $satuan    = $_POST['satuan'];
    $stok      = $_POST['stok'];

    $simpan = mysqli_query($koneksi, "INSERT INTO obat (nama_obat, satuan, stok) VALUES ('$nama_obat', '$satuan', '$stok')");

    if ($simpan) {
        echo "<script>alert('Data Obat Berhasil Disimpan'); window.location='obat.php';</script>";
    }
}
?>

<h3>Tambah Data Obat</h3>
<div class="card shadow-sm col-md-6">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" placeholder="Contoh: Tablet, Kapsul, Sirup" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="obat.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>