<x-app-layout>

    <x-slot name="header">
        <h2 class="dashboard-heading">
            Dashboard Manajemen Buku
        </h2>
    </x-slot>

    <style>
        .dashboard-page {
            background: #f1f5f9;
            min-height: 100vh;
            padding: 35px 20px;
            color: #26364b;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: auto;
        }

        .welcome-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #102b50, #1769aa, #268fe5);
            padding: 38px;
            border-radius: 18px;
            color: white;
            margin-bottom: 28px;
            box-shadow: 0 10px 25px rgba(23, 105, 170, .2);
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
            right: -55px;
            top: -100px;
        }

        .welcome-card h1 {
            font-size: 29px;
            font-weight: 800;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .welcome-card p {
            color: #e0edff;
            font-size: 15px;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .role-label {
            display: inline-block;
            background: rgba(255,255,255,.17);
            padding: 8px 16px;
            border-radius: 30px;
            margin-top: 12px;
            font-size: 13px;
            font-weight: bold;
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #1e293b;
        }

        .section-description {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
            border-left: 5px solid #268fe5;
        }

        .stat-icon {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .stat-card h3 {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .stat-card p {
            font-size: 17px;
            font-weight: bold;
            color: #1e293b;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .menu-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 5px 18px rgba(0,0,0,.05);
            border: 1px solid #e8edf3;
            transition: .25s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,.09);
        }

        .menu-icon {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            background: #e7f2ff;
            margin-bottom: 18px;
        }

        .menu-card h3 {
            font-size: 19px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .menu-card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
            min-height: 48px;
            margin-bottom: 22px;
        }

        .dashboard-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 21px;
            border-radius: 9px;
            color: white !important;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
            border: none;
        }

        .btn-blue {
            background: linear-gradient(135deg, #1685e0, #0759b7);
            box-shadow: 0 5px 12px rgba(22,133,224,.25);
        }

        .btn-purple {
            background: linear-gradient(135deg, #805ad5, #6038b5);
            box-shadow: 0 5px 12px rgba(128,90,213,.25);
        }

        .dashboard-btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.08);
        }

        .dashboard-footer {
            text-align: center;
            padding: 30px 10px;
            color: #94a3b8;
            font-size: 12px;
        }

        @media(max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .welcome-card {
                padding: 27px 22px;
            }

            .welcome-card h1 {
                font-size: 23px;
            }
        }
    </style>

    <div class="dashboard-page">

        <div class="dashboard-container">

            <!-- WELCOME -->
            <div class="welcome-card">

                <h1>
                    Selamat Datang, {{ Auth::user()->name }}! 👋
                </h1>

                <p>
                    Selamat datang di Sistem Informasi Manajemen Buku.
                </p>

                <p>
                    Kelola koleksi buku perpustakaan dengan mudah,
                    cepat, dan terorganisir.
                </p>

                <span class="role-label">
                    👤 Role:
                    {{ Auth::user()->getRoleNames()->first() ?? 'Pengguna' }}
                </span>

            </div>

            <!-- STATISTIK -->
            <h2 class="section-title">Ringkasan Dashboard</h2>

            <p class="section-description">
                Informasi singkat mengenai sistem manajemen buku.
            </p>

            <div class="stats-grid">

                <div class="stat-card">
                    <div class="stat-icon">📚</div>
                    <h3>Total Koleksi Buku</h3>
                    <p>{{ \App\Models\Book::count() }} Buku</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <h3>Total Stok Buku</h3>
                    <p>{{ \App\Models\Book::sum('stok') }} Buku</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">👤</div>
                    <h3>Akun Pengguna</h3>
                    <p>{{ \App\Models\User::count() }} Pengguna</p>
                </div>

            </div>

            <!-- MENU -->
            <h2 class="section-title">Menu Aplikasi</h2>

            <p class="section-description">
                Pilih menu di bawah ini untuk mulai menggunakan aplikasi.
            </p>

            <div class="menu-grid">

                <!-- MENU BUKU -->
                <div class="menu-card">

                    <div class="menu-icon">
                        📚
                    </div>

                    <h3>Manajemen Buku</h3>

                    <p>
                        Lihat seluruh koleksi buku, tambahkan buku baru,
                        perbarui informasi, dan kelola data perpustakaan.
                    </p>

                    <a href="{{ route('books.index') }}"
                       class="dashboard-btn btn-blue">

                        📖 Kelola Data Buku →

                    </a>

                </div>

                <!-- MENU PROFILE -->
                <div class="menu-card">

                    <div class="menu-icon"
                         style="background:#f0eaff">

                        👤

                    </div>

                    <h3>Profil Pengguna</h3>

                    <p>
                        Lihat dan perbarui informasi akun pengguna,
                        termasuk nama, email, dan kata sandi.
                    </p>

                    <a href="{{ route('profile.edit') }}"
                       class="dashboard-btn btn-purple">

                        ⚙️ Pengaturan Profil →

                    </a>

                </div>

            </div>

            <!-- FOOTER -->
            <div class="dashboard-footer">
                © 2026 Manajemen Buku | Laravel Framework
            </div>

        </div>

    </div>

</x-app-layout>
