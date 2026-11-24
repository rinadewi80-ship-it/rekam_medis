<?php
include 'koneksi.php';
include 'header.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama_obat = $_POST['nama_obat'];
    $satuan    = $_POST['satuan'];
    $stok      = $_POST['stok'];

    $update = mysqli_query($koneksi, "UPDATE obat SET nama_obat='$nama_obat', satuan='$satuan', stok='$stok' WHERE id_obat='$id'");

    if ($update) {
        echo "<script>alert('Data Obat Berhasil Diperbarui'); window.location='obat.php';</script>";
    }
}
?>

<h3>Edit Data Obat</h3>
<div class="card shadow-sm col-md-6">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" value="<?= $data['nama_obat']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" value="<?= $data['satuan']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" value="<?= $data['stok']; ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="obat.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>