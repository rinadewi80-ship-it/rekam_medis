<?php
include 'koneksi.php';
include 'header.php';

// Pelacak error
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['simpan'])) {
    $nama_dokter  = mysqli_real_escape_string($koneksi, $_POST['nama_dokter']);
    $spesialisasi = mysqli_real_escape_string($koneksi, $_POST['spesialisasi']);

    try {
        $sql = "INSERT INTO dokter (nama_dokter, spesialisasi) VALUES ('$nama_dokter', '$spesialisasi')";
        $simpan = mysqli_query($koneksi, $sql);

        if ($simpan) {
            echo "<script>alert('Data Dokter Berhasil Disimpan'); window.location='dokter.php';</script>";
            exit;
        }
    } catch (Exception $e) {
        // Menampilkan pesan kesalahan jika query ke database gagal
        echo "<div class='alert alert-danger mb-3'><strong>Gagal Simpan Data!</strong><br>Pesan Error: " . $e->getMessage() . "</div>";
    }
}
?>

<h3>Tambah Data Dokter</h3>
<div class="card shadow-sm col-md-6 mb-4">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Dokter</label>
                <input type="text" name="nama_dokter" class="form-control" required placeholder="Contoh: dr. Andi Wijaya">
            </div>
            <div class="mb-3">
                <label class="form-label">Spesialisasi</label>
                <input type="text" name="spesialisasi" class="form-control" required placeholder="Contoh: Spesialis Penyakit Dalam">
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan Dokter</button>
            <a href="dokter.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>