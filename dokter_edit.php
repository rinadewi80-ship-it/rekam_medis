<?php
include 'koneksi.php';
include 'header.php';

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama_dokter  = mysqli_real_escape_string($koneksi, $_POST['nama_dokter']);
    $spesialisasi = mysqli_real_escape_string($koneksi, $_POST['spesialisasi']);

    $update = mysqli_query($koneksi, "UPDATE dokter SET nama_dokter='$nama_dokter', spesialisasi='$spesialisasi' WHERE id_dokter='$id'");

    if ($update) {
        echo "<script>alert('Data Dokter Berhasil Diperbarui'); window.location='dokter.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<h3>Edit Data Dokter</h3>
<div class="card shadow-sm col-md-6">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Dokter</label>
                <input type="text" name="nama_dokter" value="<?= htmlspecialchars($data['nama_dokter']); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Spesialisasi</label>
                <input type="text" name="spesialisasi" value="<?= htmlspecialchars($data['spesialisasi']); ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update Dokter</button>
            <a href="dokter.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>