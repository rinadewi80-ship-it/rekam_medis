<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Data Dokter</h3>
        <p class="text-muted small mb-0">Daftar dokter dan spesialisasi medis.</p>
    </div>
    <a href="dokter_tambah.php" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> Tambah Dokter
    </a>
</div>

<div class="card card-custom col-md-10">
    <div class="card-body p-0">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">No</th>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM dokter ORDER BY id_dokter DESC");
                if (mysqli_num_rows($query) == 0) {
                    echo "<tr><td colspan='4' class='text-center py-4 text-muted'>Belum ada data dokter.</td></tr>";
                } else {
                    while ($data = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td class="ps-4 fw-semibold text-secondary"><?= $no++; ?></td>
                    <td class="fw-bold text-dark">
                        <i class="bi bi-person-badge text-primary me-2"></i><?= htmlspecialchars($data['nama_dokter']); ?>
                    </td>
                    <td>
                        <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">
                            <?= htmlspecialchars($data['spesialisasi']); ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="dokter_edit.php?id=<?= $data['id_dokter']; ?>" class="btn btn-outline-warning" title="Edit"><i class="bi bi-pencil"></i></a>
                            <a href="dokter_hapus.php?id=<?= $data['id_dokter']; ?>" class="btn btn-outline-danger" onclick="return confirm('Hapus dokter ini?')" title="Hapus"><i class="bi bi-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php 
                    endwhile; 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>