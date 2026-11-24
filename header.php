<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Rekam Medis</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            /* Palet Warna Pastel */
            --bg-main: #f8fafc;
            --sidebar-bg: #ffffff;
            --pastel-mint: #ccfbf1;
            --pastel-mint-dark: #0f766e;
            --pastel-blue: #e0f2fe;
            --pastel-blue-dark: #0369a1;
            --pastel-purple: #f3e8ff;
            --pastel-purple-dark: #6b21a8;
            --pastel-peach: #ffe4e6;
            --pastel-peach-dark: #9f1239;
            --pastel-amber: #fef3c7;
            --pastel-amber-dark: #92400e;
            --text-slate: #334155;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-slate);
        }

        /* Sidebar Styling (Light Pastel Clean) */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            border-right: 1px solid #e2e8f0;
            color: #64748b;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            color: #1e293b;
            font-weight: 800;
            font-size: 1.15rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .sidebar-menu {
            padding: 1rem 0.75rem;
            flex-grow: 1;
        }

        .nav-link-custom {
            color: #64748b;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .nav-link-custom:hover {
            color: var(--pastel-mint-dark);
            background-color: var(--pastel-mint);
        }

        .nav-link-custom.active {
            color: var(--pastel-mint-dark);
            background-color: var(--pastel-mint);
            font-weight: 700;
        }

        /* Main Content Styling */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .content-body {
            padding: 2rem;
            flex-grow: 1;
        }

        /* Card Pastel Custom */
        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        /* Metric Cards (Pastel Flavors) */
        .metric-card {
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .metric-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.04);
        }

        .card-pastel-blue { background-color: var(--pastel-blue); color: var(--pastel-blue-dark); border-color: #bae6fd; }
        .card-pastel-mint { background-color: var(--pastel-mint); color: var(--pastel-mint-dark); border-color: #99f6e4; }
        .card-pastel-amber { background-color: var(--pastel-amber); color: var(--pastel-amber-dark); border-color: #fde68a; }
        .card-pastel-purple { background-color: var(--pastel-purple); color: var(--pastel-purple-dark); border-color: #e9d5ff; }

        .metric-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(4px);
        }

        /* Table Design */
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        .table-custom thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .table-custom tbody td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            font-size: 0.88rem;
        }

        /* Pastel Buttons & Inputs */
        .btn-pastel-primary {
            background-color: #99f6e4;
            color: #0f766e;
            border: 1px solid #5eead4;
            border-radius: 12px;
            font-weight: 700;
            padding: 0.6rem 1.25rem;
            transition: all 0.2s ease;
        }
        .btn-pastel-primary:hover {
            background-color: #2dd4bf;
            color: #ffffff;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 0.65rem 1rem;
            border: 1px solid #cbd5e1;
            font-size: 0.9rem;
            background-color: #fdfdfd;
        }
        .form-control:focus, .form-select:focus {
            border-color: #5eead4;
            box-shadow: 0 0 0 4px rgba(94, 234, 212, 0.25);
        }

        @media (max-width: 991px) {
            .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
            .main-wrapper { margin-left: 0; }
            .sidebar.active { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div class="sidebar-brand d-flex align-items-center gap-2">
            <div class="p-2 rounded-3 d-flex align-items-center justify-content-center" style="background-color: var(--pastel-mint); color: var(--pastel-mint-dark);">
                <i class="bi bi-heart-pulse-fill fs-5"></i>
            </div>
            <div>
                <div class="lh-1 fw-bold" style="color: #0f766e;">MEDIKAL</div>
                <small class="text-muted fw-normal fs-7">Rekam Medis Pastel</small>
            </div>
        </div>

        <div class="sidebar-menu">
            <?php $page = basename($_SERVER['PHP_SELF']); ?>
            <a href="index.php" class="nav-link-custom <?= $page == 'index.php' ? 'active' : ''; ?>">
                <i class="bi bi-grid-1x2-fill fs-5"></i> Dashboard
            </a>
            <a href="pasien.php" class="nav-link-custom <?= strpos($page, 'pasien') !== false ? 'active' : ''; ?>">
                <i class="bi bi-people-fill fs-5"></i> Data Pasien
            </a>
            <a href="dokter.php" class="nav-link-custom <?= strpos($page, 'dokter') !== false ? 'active' : ''; ?>">
                <i class="bi bi-person-badge-fill fs-5"></i> Data Dokter
            </a>
            <a href="obat.php" class="nav-link-custom <?= strpos($page, 'obat') !== false ? 'active' : ''; ?>">
                <i class="bi bi-capsule fs-5"></i> Data Obat
            </a>
            <a href="rekam_medis.php" class="nav-link-custom <?= strpos($page, 'rekam_medis') !== false ? 'active' : ''; ?>">
                <i class="bi bi-file-earmark-medical-fill fs-5"></i> Rekam Medis
            </a>
        </div>

        <div class="p-3 m-3 rounded-4" style="background-color: var(--pastel-blue);">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-shield-check fs-5" style="color: var(--pastel-blue-dark);"></i>
                <div class="small">
                    <div class="fw-bold" style="color: var(--pastel-blue-dark);">SMKN 3 Tuban</div>
                    <div class="text-muted fs-8">Uji Kompetensi Web</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="main-wrapper">
        <header class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
                <h5 class="mb-0 fw-bold" style="color: #1e293b;">Portal Rekam Medis</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background-color: var(--pastel-mint); color: var(--pastel-mint-dark);">
                    <i class="bi bi-circle-fill me-1 fs-8"></i> Sistem Aktif
                </span>
                <div class="vr"></div>
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width:36px; height:36px; background-color: var(--pastel-purple); color: var(--pastel-purple-dark);">
                        A
                    </div>
                    <span class="fw-semibold small d-none d-sm-inline" style="color: #475569;">Admin Klinik</span>
                </div>
            </div>
        </header>

        <main class="content-body">