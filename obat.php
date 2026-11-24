<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Obat</h3>
    <a href="obat_tambah.php" class="btn btn-primary">+ Tambah Obat</a>
</div>

<div class="card shadow-sm col-md-10">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY id_obat DESC");
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama_obat']; ?></td>
                    <td><?= $data['satuan']; ?></td>
                    <td><?= $data['stok']; ?></td>
                    <td>
                        <a href="obat_edit.php?id=<?= $data['id_obat']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="obat_hapus.php?id=<?= $data['id_obat']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus obat ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>