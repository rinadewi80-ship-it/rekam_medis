<?php
include 'koneksi.php';
include 'header.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $no_rm         = $_POST['no_rm'];
    $nama_pasien   = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat        = $_POST['alamat'];

    $update = mysqli_query($koneksi, "UPDATE pasien SET no_rm='$no_rm', nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat' WHERE id_pasien='$id'");

    if ($update) {
        echo "<script>alert('Data Pasien Berhasil Diperbarui'); window.location='pasien.php';</script>";
    }
}
?>

<h3>Edit Data Pasien</h3>
<div class="card shadow-sm col-md-8">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label>No. RM</label>
                <input type="text" name="no_rm" value="<?= $data['no_rm']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" value="<?= $data['nama_pasien']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-Laki (L)</option>
                    <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan (P)</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required><?= $data['alamat']; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="pasien.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>