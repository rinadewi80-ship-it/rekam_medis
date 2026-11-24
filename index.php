<?php
include 'koneksi.php';
include 'header.php';

$q_pasien = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pasien");
$q_dokter = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM dokter");
$q_obat   = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM obat");
$q_rekam  = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM rekam_medis");

$total_pasien = mysqli_fetch_assoc($q_pasien)['total'] ?? 0;
$total_dokter = mysqli_fetch_assoc($q_dokter)['total'] ?? 0;
$total_obat   = mysqli_fetch_assoc($q_obat)['total'] ?? 0;
$total_rekam  = mysqli_fetch_assoc($q_rekam)['total'] ?? 0;
?>

<!-- Banner Welcome Pastel -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card-custom p-4 border-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #ccfbf1 0%, #e0f2fe 100%);">
            <div class="position-relative z-1">
                <h3 class="fw-bold mb-1" style="color: #0f766e;">Selamat Datang di Sistem Rekam Medis 🌸</h3>
                <p class="mb-0" style="color: #334155;">Kelola riwayat pemeriksaan pasien, daftar dokter, dan persediaan obat dengan antarmuka yang bersih & tenang.</p>
            </div>
            <i class="bi bi-hospital position-absolute end-0 bottom-0 text-teal opacity-10" style="font-size: 9rem; margin-right: -1rem; margin-bottom: -2rem; color: #0d9488;"></i>
        </div>
    </div>
</div>

<!-- Grid Metrics Pastel Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="metric-card card-pastel-blue">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold small">TOTAL PASIEN</span>
                <div class="metric-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
            <h2 class="fw-extrabold mb-2"><?= $total_pasien; ?></h2>
            <a href="pasien.php" class="text-decoration-none small fw-bold d-inline-flex align-items-center gap-1" style="color: inherit;">
                Kelola Pasien <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="metric-card card-pastel-mint">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold small">TOTAL DOKTER</span>
                <div class="metric-icon">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
            </div>
            <h2 class="fw-extrabold mb-2"><?= $total_dokter; ?></h2>
            <a href="dokter.php" class="text-decoration-none small fw-bold d-inline-flex align-items-center gap-1" style="color: inherit;">
                Kelola Dokter <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="metric-card card-pastel-amber">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold small">TOTAL OBAT</span>
                <div class="metric-icon">
                    <i class="bi bi-capsule"></i>
                </div>
            </div>
            <h2 class="fw-extrabold mb-2"><?= $total_obat; ?></h2>
            <a href="obat.php" class="text-decoration-none small fw-bold d-inline-flex align-items-center gap-1" style="color: inherit;">
                Kelola Obat <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="metric-card card-pastel-purple">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold small">REKAM MEDIS</span>
                <div class="metric-icon">
                    <i class="bi bi-file-earmark-medical-fill"></i>
                </div>
            </div>
            <h2 class="fw-extrabold mb-2"><?= $total_rekam; ?></h2>
            <a href="rekam_medis.php" class="text-decoration-none small fw-bold d-inline-flex align-items-center gap-1" style="color: inherit;">
                Lihat Riwayat <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Preview Tabel Rekam Medis -->
<div class="card-custom">
    <div class="p-3 p-md-4 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0" style="color: #1e293b;"><i class="bi bi-clock-history me-2" style="color: #0f766e;"></i>Pemeriksaan Terbaru</h6>
        <a href="rekam_medis_tambah.php" class="btn btn-pastel-primary btn-sm d-flex align-items-center gap-1">
            <i class="bi bi-plus-lg"></i> Rekam Medis Baru
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-custom align-middle mb-0">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Diagnosa</th>
                    <th>Obat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT rm.*, p.nama_pasien, p.no_rm, d.nama_dokter, o.nama_obat 
                        FROM rekam_medis rm
                        INNER JOIN pasien p ON rm.id_pasien = p.id_pasien
                        INNER JOIN dokter d ON rm.id_dokter = d.id_dokter
                        INNER JOIN obat o ON rm.id_obat = o.id_obat
                        ORDER BY rm.id_rekam DESC LIMIT 5";
                $query = mysqli_query($koneksi, $sql);

                if (mysqli_num_rows($query) == 0) {
                    echo "<tr><td colspan='5' class='text-center py-4 text-muted'>Belum ada transaksi rekam medis.</td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td>
                        <span class="badge rounded-pill fw-normal" style="background-color: var(--pastel-blue); color: var(--pastel-blue-dark);">
                            <?= date('d/m/Y', strtotime($row['tanggal_periksa'])); ?>
                        </span>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark"><?= htmlspecialchars($row['nama_pasien']); ?></div>
                        <small class="text-muted"><?= htmlspecialchars($row['no_rm']); ?></small>
                    </td>
                    <td><?= htmlspecialchars($row['nama_dokter']); ?></td>
                    <td><span class="badge rounded-pill" style="background-color: var(--pastel-peach); color: var(--pastel-peach-dark);"><?= htmlspecialchars($row['diagnosa']); ?></span></td>
                    <td class="text-muted"><i class="bi bi-capsule me-1" style="color: #0d9488;"></i><?= htmlspecialchars($row['nama_obat']); ?></td>
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