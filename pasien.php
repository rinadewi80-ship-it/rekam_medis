<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pasien</h3>
    <a href="pasien_tambah.php" class="btn btn-primary">+ Tambah Pasien</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. RM</th>
                    <th>Nama Pasien</th>
                    <th>JK</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC");
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['no_rm']; ?></td>
                    <td><?= $data['nama_pasien']; ?></td>
                    <td><?= $data['jenis_kelamin']; ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tanggal_lahir'])); ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td>
                        <a href="pasien_edit.php?id=<?= $data['id_pasien']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="pasien_hapus.php?id=<?= $data['id_pasien']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>