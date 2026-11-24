<?php
include 'koneksi.php';
include 'header.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM rekam_medis WHERE id_rekam = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $id_pasien       = $_POST['id_pasien'];
    $id_dokter       = $_POST['id_dokter'];
    $id_obat         = $_POST['id_obat'];
    $tanggal_periksa = $_POST['tanggal_periksa'];
    $keluhan         = $_POST['keluhan'];
    $diagnosa        = $_POST['diagnosa'];
    $tindakan        = $_POST['tindakan'];
    $resep           = $_POST['resep'];

    $update = mysqli_query($koneksi, "UPDATE rekam_medis SET 
        id_pasien='$id_pasien', 
        id_dokter='$id_dokter', 
        id_obat='$id_obat', 
        tanggal_periksa='$tanggal_periksa', 
        keluhan='$keluhan', 
        diagnosa='$diagnosa', 
        tindakan='$tindakan', 
        resep='$resep' 
        WHERE id_rekam='$id'");

    if ($update) {
        echo "<script>alert('Rekam Medis Berhasil Diperbarui'); window.location='rekam_medis.php';</script>";
    }
}
?>

<h3>Edit Rekam Medis</h3>
<div class="card shadow-sm col-md-8">
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label>Pilih Pasien</label>
                <select name="id_pasien" class="form-control" required>
                    <?php
                    $q_p = mysqli_query($koneksi, "SELECT * FROM pasien");
                    while ($p = mysqli_fetch_assoc($q_p)) {
                        $sel = ($p['id_pasien'] == $data['id_pasien']) ? 'selected' : '';
                        echo "<option value='".$p['id_pasien']."' $sel>".$p['no_rm']." - ".$p['nama_pasien']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Pilih Dokter</label>
                <select name="id_dokter" class="form-control" required>
                    <?php
                    $q_d = mysqli_query($koneksi, "SELECT * FROM dokter");
                    while ($d = mysqli_fetch_assoc($q_d)) {
                        $sel = ($d['id_dokter'] == $data['id_dokter']) ? 'selected' : '';
                        echo "<option value='".$d['id_dokter']."' $sel>".$d['nama_dokter']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Pilih Obat</label>
                <select name="id_obat" class="form-control" required>
                    <?php
                    $q_o = mysqli_query($koneksi, "SELECT * FROM obat");
                    while ($o = mysqli_fetch_assoc($q_o)) {
                        $sel = ($o['id_obat'] == $data['id_obat']) ? 'selected' : '';
                        echo "<option value='".$o['id_obat']."' $sel>".$o['nama_obat']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Periksa</label>
                <input type="date" name="tanggal_periksa" value="<?= $data['tanggal_periksa']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Keluhan</label>
                <textarea name="keluhan" class="form-control" rows="2" required><?= $data['keluhan']; ?></textarea>
            </div>
            <div class="mb-3">
                <label>Diagnosa</label>
                <textarea name="diagnosa" class="form-control" rows="2" required><?= $data['diagnosa']; ?></textarea>
            </div>
            <div class="mb-3">
                <label>Tindakan</label>
                <textarea name="tindakan" class="form-control" rows="2" required><?= $data['tindakan']; ?></textarea>
            </div>
            <div class="mb-3">
                <label>Resep / Aturan Pakai</label>
                <input type="text" name="resep" value="<?= $data['resep']; ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update Rekam Medis</button>
            <a href="rekam_medis.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>