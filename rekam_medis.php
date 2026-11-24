<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Riwayat Rekam Medis</h3>
        <p class="text-muted small mb-0">Daftar pemeriksaan dan tindakan medis pasien terintegrasi.</p>
    </div>
    <a href="rekam_medis_tambah.php" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> Tambah Pemeriksaan
    </a>
</div>

<div class="card card-custom">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Tanggal</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Tindakan & Resep</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT rm.*, p.nama_pasien, p.no_rm, d.nama_dokter, o.nama_obat 
                            FROM rekam_medis rm
                            INNER JOIN pasien p ON rm.id_pasien = p.id_pasien
                            INNER JOIN dokter d ON rm.id_dokter = d.id_dokter
                            INNER JOIN obat o ON rm.id_obat = o.id_obat
                            ORDER BY rm.id_rekam DESC";
                    $query = mysqli_query($koneksi, $sql);
                    
                    if (mysqli_num_rows($query) == 0) {
                        echo "<tr><td colspan='8' class='text-center py-4 text-muted'>Belum ada data rekam medis.</td></tr>";
                    } else {
                        while ($data = mysqli_fetch_assoc($query)) :
                    ?>
                    <tr>
                        <td class="ps-4 fw-semibold text-secondary"><?= $no++; ?></td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <i class="bi bi-calendar-event me-1"></i><?= date('d/m/Y', strtotime($data['tanggal_periksa'])); ?>
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark"><?= htmlspecialchars($data['nama_pasien']); ?></div>
                            <small class="text-muted"><i class="bi bi-card-heading me-1"></i><?= htmlspecialchars($data['no_rm']); ?></small>
                        </td>
                        <td>
                            <div class="fw-semibold text-primary"><?= htmlspecialchars($data['nama_dokter']); ?></div>
                        </td>
                        <td><small class="text-secondary"><?= htmlspecialchars($data['keluhan']); ?></small></td>
                        <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><?= htmlspecialchars($data['diagnosa']); ?></span></td>
                        <td>
                            <div class="small fw-semibold"><?= htmlspecialchars($data['tindakan']); ?></div>
                            <small class="text-success"><i class="bi bi-capsule me-1"></i><?= htmlspecialchars($data['nama_obat']); ?> (<?= htmlspecialchars($data['resep']); ?>)</small>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="rekam_medis_edit.php?id=<?= $data['id_rekam']; ?>" class="btn btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="rekam_medis_hapus.php?id=<?= $data['id_rekam']; ?>" class="btn btn-outline-danger" onclick="return confirm('Hapus rekam medis ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
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
</div>

<?php include 'footer.php'; ?>