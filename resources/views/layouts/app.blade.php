<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Karyawan') · Data Karyawan</title>
    <style>
        /* ===== Token warna & ukuran ===== */
        :root {
            --kuning: #F2C744;
            --kuning-hover: #E5B730;
            --latar: #FBFAF6;
            --permukaan: #FFFFFF;
            --teks: #201F1A;
            --teks-redup: #6B675C;
            --garis: #E7E3D8;
            --garis-input: #D6D0C1;
            --kepala-tabel: #F4F2EB;
            --hijau: #3F9A4A;
            --merah: #B42318;
            --radius: 8px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--latar);
            color: var(--teks);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a { color: inherit; }

        :focus-visible {
            outline: 3px solid var(--teks);
            outline-offset: 2px;
            border-radius: 4px;
        }

        .sr-only {
            position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
            overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;
        }

        /* ===== Header ===== */
        .site-header {
            background: var(--permukaan);
            border-bottom: 1px solid var(--garis);
        }
        .header-inner {
            max-width: 1080px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            gap: 28px;
            min-height: 72px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 19px;
            letter-spacing: -0.01em;
        }
        .brand-icon {
            width: 40px; height: 40px;
            border-radius: var(--radius);
            background: var(--kuning);
            display: grid; place-items: center;
            flex-shrink: 0;
        }
        .main-nav {
            display: flex;
            gap: 4px;
            align-self: stretch;
            padding-left: 28px;
            border-left: 1px solid var(--garis);
            margin: 18px 0;
        }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0 12px;
            min-height: 44px;
            margin: -18px 0;
            text-decoration: none;
            color: var(--teks-redup);
            border-bottom: 3px solid transparent;
            border-top: 3px solid transparent;
        }
        .nav-link:hover { color: var(--teks); }
        .nav-link.is-active {
            color: var(--teks);
            font-weight: 600;
            border-bottom-color: var(--kuning);
        }

        /* ===== Area halaman ===== */
        .page {
            flex: 1;
            width: 100%;
            max-width: 1080px;
            margin: 0 auto;
            padding: 32px 24px 48px;
        }
        .page-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }
        .page-title {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: -0.02em;
        }
        .page-meta { margin: 4px 0 0; color: var(--teks-redup); }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            min-height: 44px;
            margin-bottom: 4px;
            color: var(--teks-redup);
            text-decoration: none;
        }
        .back-link:hover { color: var(--teks); text-decoration: underline; }

        .card {
            background: var(--permukaan);
            border: 1px solid var(--garis);
            border-radius: var(--radius);
        }

        /* ===== Tombol ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 44px;
            padding: 0 18px;
            border-radius: var(--radius);
            border: 1px solid transparent;
            font: inherit;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
        }
        .btn-primary { background: var(--kuning); color: var(--teks); }
        .btn-primary:hover { background: var(--kuning-hover); }
        .btn-secondary { background: var(--permukaan); color: var(--teks); border-color: var(--garis-input); }
        .btn-secondary:hover { background: var(--latar); }

        /* ===== Pesan status ===== */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: var(--radius);
            border: 1px solid;
            font-weight: 500;
        }
        .alert-success { background: #EEF7EC; border-color: #CFE6C9; color: #1F5130; }
        .alert-error { background: #FDF0EE; border-color: #F2CCC5; color: #8A2316; }
        .alert svg { flex-shrink: 0; }

        /* ===== Tabel daftar ===== */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .data-table th {
            background: var(--kepala-tabel);
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 16px;
            border-bottom: 1px solid var(--garis);
            white-space: nowrap;
        }
        .data-table th:first-child { border-top-left-radius: calc(var(--radius) - 1px); }
        .data-table th:last-child { border-top-right-radius: calc(var(--radius) - 1px); }
        .data-table td {
            padding: 10px 16px;
            border-bottom: 1px solid var(--garis);
            vertical-align: middle;
        }
        .data-table tbody tr:last-child td { border-bottom: 0; }
        .data-table .num { text-align: right; font-variant-numeric: tabular-nums; }
        .data-table .col-aksi { text-align: right; width: 72px; }
        .cell-kode { white-space: nowrap; font-variant-numeric: tabular-nums; }
        .cell-gaji { white-space: nowrap; }
        .nama { font-weight: 500; }
        .m-meta, .m-gaji { display: none; }

        .status { display: inline-flex; align-items: center; gap: 8px; white-space: nowrap; }
        .status::before {
            content: "";
            width: 8px; height: 8px;
            border-radius: 50%;
            background: currentColor;
        }
        .status.is-active::before { background: var(--hijau); }
        .status.is-inactive { color: var(--teks-redup); }
        .status.is-inactive::before { background: #A8A396; }

        /* ===== Menu tiga titik ===== */
        .row-menu { position: relative; display: inline-block; }
        .row-menu > summary { list-style: none; }
        .row-menu > summary::-webkit-details-marker { display: none; }
        .icon-btn {
            width: 44px; height: 44px;
            display: grid; place-items: center;
            border: 1px solid var(--garis);
            border-radius: var(--radius);
            background: var(--permukaan);
            cursor: pointer;
        }
        .icon-btn:hover, .row-menu[open] > .icon-btn { background: var(--latar); border-color: var(--garis-input); }
        .menu-panel {
            position: absolute;
            right: 0;
            top: calc(100% + 6px);
            z-index: 20;
            min-width: 168px;
            padding: 6px;
            background: var(--permukaan);
            border: 1px solid var(--garis);
            border-radius: var(--radius);
            box-shadow: 0 6px 18px rgba(32, 31, 26, 0.08);
            text-align: left;
        }
        .menu-panel form { margin: 0; }
        .menu-item {
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 44px;
            padding: 0 12px;
            border: 0;
            border-radius: 6px;
            background: none;
            font: inherit;
            color: var(--teks);
            text-decoration: none;
            text-align: left;
            cursor: pointer;
        }
        .menu-item:hover { background: var(--latar); }
        .menu-item--danger { color: var(--merah); }
        .menu-item--danger:hover { background: #FDF0EE; }
        .menu-divider { height: 1px; background: var(--garis); margin: 6px 0; }

        /* ===== Kosong ===== */
        .empty-state {
            text-align: center;
            padding: 56px 24px;
        }
        .empty-state svg { color: var(--teks-redup); }
        .empty-state h2 { margin: 16px 0 6px; font-size: 20px; }
        .empty-state p { margin: 0 0 24px; color: var(--teks-redup); }

        /* ===== Detail ===== */
        .detail-list { margin: 0; padding: 4px 24px; }
        .detail-row {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--garis);
        }
        .detail-row:last-child { border-bottom: 0; }
        .detail-row dt { font-weight: 600; }
        .detail-row dd { margin: 0; overflow-wrap: anywhere; }

        /* ===== Formulir ===== */
        .form-card { padding: 24px; }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 24px;
        }
        .field label { display: block; font-weight: 600; margin-bottom: 6px; }
        .field-hint { margin: 6px 0 0; font-size: 13px; color: var(--teks-redup); }
        .field-error { margin: 6px 0 0; font-size: 13px; color: var(--merah); font-weight: 500; }
        .input, .select {
            width: 100%;
            min-height: 44px;
            padding: 10px 12px;
            font: inherit;
            color: var(--teks);
            background: var(--permukaan);
            border: 1px solid var(--garis-input);
            border-radius: var(--radius);
        }
        .input::placeholder { color: #A29D90; }
        .input:focus, .select:focus {
            outline: none;
            border-color: var(--teks);
            box-shadow: 0 0 0 3px rgba(242, 199, 68, 0.6);
        }
        .input:disabled { background: #F1EEE6; color: var(--teks-redup); cursor: not-allowed; }
        .input[aria-invalid="true"], .select[aria-invalid="true"] { border-color: var(--merah); }
        .select {
            appearance: none;
            padding-right: 40px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23201F1A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
        }
        .input-group { display: flex; }
        .input-addon {
            display: grid; place-items: center;
            padding: 0 14px;
            background: #F1EEE6;
            border: 1px solid var(--garis-input);
            border-right: 0;
            border-radius: var(--radius) 0 0 var(--radius);
            color: var(--teks-redup);
            font-weight: 500;
        }
        .input-group .input { border-radius: 0 var(--radius) var(--radius) 0; }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--garis);
        }

        /* ===== Footer ===== */
        .site-footer { padding: 0 24px; }
        .footer-inner {
            max-width: 1032px;
            margin: 0 auto;
            padding: 20px 0 28px;
            border-top: 1px solid var(--garis);
            color: var(--teks-redup);
            font-size: 14px;
        }

        /* ===== HP ===== */
        @media (max-width: 720px) {
            .header-inner { flex-wrap: wrap; gap: 0; padding: 12px 16px 0; min-height: 0; }
            .brand { width: 100%; padding-bottom: 8px; font-size: 18px; }
            .main-nav { padding-left: 0; border-left: 0; margin: 0 -12px; align-self: auto; }
            .nav-link { margin: 0; }

            .page { padding: 20px 16px 32px; }
            .page-head { flex-direction: column; align-items: stretch; margin-bottom: 20px; }
            .page-head .btn { width: 100%; }
            .page-title { font-size: 24px; }

            /* tabel berubah jadi tumpukan kartu */
            .table-wrap { border: 0; background: none; }
            .data-table, .data-table tbody { display: block; }
            .data-table thead { position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0, 0, 0, 0); }
            .data-table tbody tr {
                display: grid;
                grid-template-columns: 1fr auto;
                grid-template-areas: "nama aksi" "status aksi";
                gap: 6px 12px;
                padding: 14px 12px 14px 16px;
                margin-bottom: 12px;
                background: var(--permukaan);
                border: 1px solid var(--garis);
                border-radius: var(--radius);
            }
            .data-table td { padding: 0; border: 0; }
            .data-table .cell-kode, .data-table .cell-kategori,
            .data-table .cell-lokasi, .data-table .cell-gaji { display: none; }
            .cell-nama { grid-area: nama; }
            .cell-status { grid-area: status; }
            .cell-aksi { grid-area: aksi; align-self: start; }
            .nama { display: block; font-weight: 700; font-size: 16px; }
            .m-meta { display: block; color: var(--teks-redup); font-size: 14px; }
            .m-gaji { display: block; font-weight: 700; font-size: 16px; margin-top: 4px; font-variant-numeric: tabular-nums; }

            .detail-list { padding: 4px 16px; }
            .detail-row { grid-template-columns: 1fr; gap: 2px; padding: 12px 0; }
            .detail-row dt { font-size: 13px; color: var(--teks-redup); font-weight: 500; }

            .form-card { padding: 16px; }
            .form-grid { grid-template-columns: 1fr; gap: 16px; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; }

            .site-footer { padding: 0 16px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a href="{{ route('karyawan.index') }}" class="brand">
                <span class="brand-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M5.8 16.2c.7-1.3 1.8-1.9 3.2-1.9s2.5.6 3.2 1.9"/><path d="M14.5 10h4M14.5 14h4"/></svg>
                </span>
                <span>Data Karyawan</span>
            </a>

            <nav class="main-nav" aria-label="Navigasi utama">
                <a href="{{ route('karyawan.index') }}"
                   class="nav-link {{ request()->routeIs('karyawan.index', 'karyawan.show', 'karyawan.edit') ? 'is-active' : '' }}"
                   @if(request()->routeIs('karyawan.index')) aria-current="page" @endif>Daftar Karyawan</a>
                <a href="{{ route('karyawan.create') }}"
                   class="nav-link {{ request()->routeIs('karyawan.create') ? 'is-active' : '' }}"
                   @if(request()->routeIs('karyawan.create')) aria-current="page" @endif>Tambah Karyawan</a>
            </nav>
        </div>
    </header>

    <main class="page">
        {{-- Judul halaman tiap view --}}
        @yield('header')

        {{-- Pesan dari controller (redirect()->with(...)) --}}
        @if(session('status'))
            <div class="alert alert-success" role="status">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3F9A4A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error" role="alert">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16.5v.5"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">damkenprint</div>
    </footer>

    <script>
        // Menu tiga titik: hanya satu yang terbuka, tutup saat klik di luar atau tekan Esc.
        document.addEventListener('toggle', function (event) {
            const menu = event.target;
            if (!menu.matches || !menu.matches('.row-menu') || !menu.open) return;
            document.querySelectorAll('.row-menu[open]').forEach(function (other) {
                if (other !== menu) other.open = false;
            });
        }, true);

        document.addEventListener('click', function (event) {
            document.querySelectorAll('.row-menu[open]').forEach(function (menu) {
                if (!menu.contains(event.target)) menu.open = false;
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Escape') return;
            const menu = document.querySelector('.row-menu[open]');
            if (menu) {
                menu.open = false;
                menu.querySelector('summary').focus();
            }
        });
    </script>
</body>
</html>
