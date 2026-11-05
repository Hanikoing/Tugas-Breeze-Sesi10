<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #344767;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px;
            background: linear-gradient(180deg, #34474d, #26383e);
            color: white;
            position: fixed;
            height: 100vh;
            padding: 20px 15px;
        }

        .brand {
            height: 75px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            border-bottom: 1px solid rgba(255,255,255,.12);
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .brand-icon {
            font-size: 30px;
        }

        .menu-title {
            font-size: 11px;
            color: #aebdc2;
            font-weight: bold;
            margin: 25px 12px 12px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #fff;
            text-decoration: none;
            padding: 13px 12px;
            border-radius: 8px;
            margin-bottom: 5px;
            font-size: 14px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(135deg, #2698ed, #1682d6);
            box-shadow: 0 4px 10px rgba(0,120,220,.25);
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 230px;
            width: calc(100% - 230px);
        }

        .topbar {
            height: 65px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 30px;
            gap: 22px;
            box-shadow: 0 1px 5px rgba(0,0,0,.05);
        }

        .topbar a {
            color: #344767;
            text-decoration: none;
            font-size: 13px;
        }

        .content {
            padding: 30px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #8392a5;
            margin-bottom: 8px;
        }

        .page-title {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #344767;
        }

        /* TABLE CARD */
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        .card-header {
            background: linear-gradient(135deg, #2699ed, #1682d6);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 15px;
            font-weight: bold;
            box-shadow: 0 5px 12px rgba(38,153,237,.25);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            text-align: left;
            font-size: 11px;
            color: #8392a5;
            padding: 16px 12px;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 17px 12px;
            font-size: 13px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .book-icon {
            font-size: 23px;
        }

        .book-title {
            font-weight: bold;
            color: #344767;
        }

        .stock {
            display: inline-block;
            background: #e5f7ed;
            color: #269b62;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .stock-empty {
            background: #ffe9e9;
            color: #e44b4b;
        }

        .action {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            padding: 7px 12px;
            border-radius: 5px;
            color: white;
            font-size: 11px;
            cursor: pointer;
        }

        .btn-detail {
            background: #64748b;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-delete {
            background: #ef4444;
        }

        .btn:hover {
            opacity: .85;
        }

        /* BOTTOM BUTTONS */
        .button-area {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-add {
            background: linear-gradient(135deg, #2699ed, #1682d6);
            padding: 14px 25px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(38,153,237,.25);
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #8392a5;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            padding: 30px;
            color: #8392a5;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 15px 8px;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .brand-name,
            .menu-title,
            .menu-text {
                display: none;
            }

            .menu a {
                justify-content: center;
                font-size: 20px;
                padding: 14px 5px;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
            }

            .content {
                padding: 15px;
            }

            .topbar {
                padding: 0 15px;
            }

            .footer {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <span class="brand-icon">♧</span>
            <span class="brand-name">BOOK MANAGEMENT</span>
        </div>

        <div class="menu">

            <a href="{{ route('dashboard') }}">
                <span>⌂</span>
                <span class="menu-text">Dashboard</span>
            </a>

            <a href="{{ route('profile.edit') }}">
                <span>👤</span>
                <span class="menu-text">Profile</span>
            </a>

            <div class="menu-title">BOOK APP</div>

            <a href="{{ route('books.index') }}" class="active">
                <span>▤</span>
                <span class="menu-text">Books</span>
            </a>

            @can('create books')
                <a href="{{ route('books.create') }}">
                    <span>📄</span>
                    <span class="menu-text">Add Book</span>
                </a>
            @endcan

        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <span>👤 {{ Auth::user()->name }}</span>

            <a href="{{ route('profile.edit') }}">Profile</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="border:0;background:none;cursor:pointer;color:#344767">
                    Logout
                </button>
            </form>

        </header>

        <!-- CONTENT -->
        <section class="content">

            <div class="breadcrumb">
                Book-App &nbsp; / &nbsp; Books
            </div>

            <h2 class="page-title">Books</h2>

            <div class="card">

                <div class="card-header">
                    Books Table
                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>BOOK</th>
                                <th>PENULIS</th>
                                <th>PENERBIT</th>
                                <th>TAHUN</th>
                                <th>STOK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($books as $book)

                                <tr>

                                    <td>
                                        <span class="book-icon">📕</span>
                                        <span class="book-title">
                                            {{ $book->judul }}
                                        </span>
                                    </td>

                                    <td>{{ $book->penulis }}</td>

                                    <td>{{ $book->penerbit }}</td>

                                    <td>{{ $book->tahun_terbit }}</td>

                                    <td>
                                        <span class="stock {{ $book->stok == 0 ? 'stock-empty' : '' }}">
                                            {{ $book->stok }} BUKU
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action">

                                            <a href="{{ route('books.show', $book->id) }}"
                                               class="btn btn-detail">
                                                Detail
                                            </a>

                                            @can('edit books')
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                   class="btn btn-edit">
                                                    Edit
                                                </a>
                                            @endcan

                                            @can('delete books')
                                                <form action="{{ route('books.destroy', $book->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-delete">
                                                        Hapus
                                                    </button>

                                                </form>
                                            @endcan

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="empty">
                                        📚 Belum ada data buku.
                                        <br><br>
                                        Silakan tambahkan buku terlebih dahulu.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- BUTTON ADD -->
                <div class="button-area">

                    @can('create books')
                        <a href="{{ route('books.create') }}" class="btn-add">
                            + ADD BOOK
                        </a>
                    @endcan

                </div>

            </div>

        </section>

        <!-- FOOTER -->
        <footer class="footer">
            <span>© 2026, Book Management System</span>
            <span>Manajemen Buku | Laravel 12</span>
        </footer>

    </main>

</div>

</body>
</html>
