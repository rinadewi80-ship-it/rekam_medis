<?php
include 'koneksi.php';
include 'header.php';

if (isset($_POST['simpan'])) {
    $no_rm         = $_POST['no_rm'];
    $nama_pasien   = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat        = $_POST['alamat'];

    $simpan = mysqli_query($koneksi, "INSERT INTO pasien (no_rm, nama_pasien, jenis_kelamin, tanggal_lahir, alamat) VALUES ('$no_rm', '$nama_pasien', '$jenis_kelamin', '$tanggal_lahir', '$alamat')");

    if ($simpan) {
        echo "<script>alert('Data Pasien Berhasil Disimpan'); window.location='pasien.php';</script>";
    }
}
?>

<h3>Tambah Data Pasien</h3>
<div class="card shadow-sm col-md-8">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label>No. RM</label>
                <input type="text" name="no_rm" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L">Laki-Laki (L)</option>
                    <option value="P">Perempuan (P)</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="pasien.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>