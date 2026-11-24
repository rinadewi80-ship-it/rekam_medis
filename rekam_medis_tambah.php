<?php
include 'koneksi.php';
include 'header.php';

// Fitur pelacak error
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['simpan'])) {
    $id_pasien       = mysqli_real_escape_string($koneksi, $_POST['id_pasien']);
    $id_dokter       = mysqli_real_escape_string($koneksi, $_POST['id_dokter']);
    $id_obat         = mysqli_real_escape_string($koneksi, $_POST['id_obat']);
    $tanggal_periksa = mysqli_real_escape_string($koneksi, $_POST['tanggal_periksa']);
    $keluhan         = mysqli_real_escape_string($koneksi, $_POST['keluhan']);
    $diagnosa        = mysqli_real_escape_string($koneksi, $_POST['diagnosa']);
    $tindakan        = mysqli_real_escape_string($koneksi, $_POST['tindakan']);
    $resep           = mysqli_real_escape_string($koneksi, $_POST['resep']);

    try {
        $sql = "INSERT INTO rekam_medis (id_pasien, id_dokter, id_obat, tanggal_periksa, keluhan, diagnosa, tindakan, resep) 
                VALUES ('$id_pasien', '$id_dokter', '$id_obat', '$tanggal_periksa', '$keluhan', '$diagnosa', '$tindakan', '$resep')";
        $simpan = mysqli_query($koneksi, $sql);

        if ($simpan) {
            echo "<script>alert('Rekam Medis Berhasil Disimpan'); window.location='rekam_medis.php';</script>";
            exit;
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mb-3'><strong>Gagal Simpan Rekam Medis!</strong><br>Pesan Error: " . $e->getMessage() . "</div>";
    }
}
?>

<h3>Tambah Catatan Rekam Medis</h3>
<div class="card shadow-sm col-md-8 mb-4">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Pilih Pasien</label>
                <select name="id_pasien" class="form-control" required>
                    <option value="">-- Pilih Pasien --</option>
                    <?php
                    $q_p = mysqli_query($koneksi, "SELECT * FROM pasien");
                    while ($p = mysqli_fetch_assoc($q_p)) {
                        echo "<option value='".$p['id_pasien']."'>".$p['no_rm']." - ".$p['nama_pasien']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Dokter</label>
                <select name="id_dokter" class="form-control" required>
                    <option value="">-- Pilih Dokter --</option>
                    <?php
                    $q_d = mysqli_query($koneksi, "SELECT * FROM dokter");
                    while ($d = mysqli_fetch_assoc($q_d)) {
                        echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']." (".$d['spesialisasi'].")</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Obat</label>
                <select name="id_obat" class="form-control" required>
                    <option value="">-- Pilih Obat --</option>
                    <?php
                    $q_o = mysqli_query($koneksi, "SELECT * FROM obat");
                    while ($o = mysqli_fetch_assoc($q_o)) {
                        echo "<option value='".$o['id_obat']."'>".$o['nama_obat']." (Stok: ".$o['stok'].")</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Periksa</label>
                <input type="date" name="tanggal_periksa" value="<?= date('Y-m-d'); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Keluhan</label>
                <textarea name="keluhan" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Diagnosa</label>
                <textarea name="diagnosa" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Tindakan</label>
                <textarea name="tindakan" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Resep / Aturan Pakai</label>
                <input type="text" name="resep" placeholder="Contoh: 3x1 tablet sesudah makan" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan Rekam Medis</button>
            <a href="rekam_medis.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>