<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .search-box {
            padding: 20px 30px;
            background: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
        }

        .search-box input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.3);
        }

        .table-container {
            padding: 30px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: #f5f6fa;
            transform: scale(1.01);
        }

        tbody tr:nth-child(even) {
            background: #fafbfc;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-aktif {
            background: #d4edda;
            color: #155724;
        }

        .status-nonaktif {
            background: #f8d7da;
            color: #721c24;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit {
            background: #667eea;
            color: white;
        }

        .btn-edit:hover {
            background: #5568d3;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1rem;
            margin: 20px 30px;
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 30px;
            background: #f8f9fa;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-card h3 {
            color: #667eea;
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8rem;
            }

            .header p {
                font-size: 0.95rem;
            }

            th, td {
                padding: 10px 8px;
                font-size: 0.9rem;
            }

            .actions {
                flex-direction: column;
                gap: 5px;
            }

            .btn {
                padding: 5px 10px;
                font-size: 0.8rem;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .header {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .search-box {
                padding: 15px;
            }

            .table-container {
                padding: 15px;
            }

            th, td {
                padding: 8px 5px;
                font-size: 0.85rem;
            }

            .btn-add {
                margin: 15px;
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        /* Card view for mobile */
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tbody tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 10px;
                padding: 15px;
                background: white;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
                padding: 10px;
            }

            td:before {
                position: absolute;
                top: 10px;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                font-weight: 600;
                color: #667eea;
            }

            td:nth-of-type(1):before { content: "NIS"; }
            td:nth-of-type(2):before { content: "Nama"; }
            td:nth-of-type(3):before { content: "Kelas"; }
            td:nth-of-type(4):before { content: "Jurusan"; }
            td:nth-of-type(5):before { content: "Status"; }
            td:nth-of-type(6):before { content: "Aksi"; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Data Siswa</h1>
            <p>Sistem Informasi Manajemen Siswa</p>
        </div>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="🔍 Cari siswa berdasarkan nama, NIS, atau kelas...">
        </div>

        <button class="btn-add" onclick="window.location.href='tambah.php'">+ Tambah Siswa Baru</button>

        <?php
        // Include konfigurasi database
        include 'config.php';

        // Query untuk statistik
        $total_siswa = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa");
        $total = mysqli_fetch_assoc($total_siswa)['total'];

        $siswa_aktif = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa WHERE status='Aktif'");
        $aktif = mysqli_fetch_assoc($siswa_aktif)['total'];

        $siswa_nonaktif = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa WHERE status='Non-Aktif'");
        $nonaktif = mysqli_fetch_assoc($siswa_nonaktif)['total'];

        $jumlah_kelas = mysqli_query($koneksi, "SELECT COUNT(DISTINCT kelas) as total FROM siswa");
        $kelas = mysqli_fetch_assoc($jumlah_kelas)['total'];

        // Query untuk menampilkan data siswa
        $query = "SELECT * FROM siswa ORDER BY id DESC";
        $result = mysqli_query($koneksi, $query);
        ?>

        <div class="stats">
            <div class="stat-card">
                <h3><?php echo $total; ?></h3>
                <p>Total Siswa</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $aktif; ?></h3>
                <p>Siswa Aktif</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $nonaktif; ?></h3>
                <p>Siswa Non-Aktif</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $kelas; ?></h3>
                <p>Kelas</p>
            </div>
        </div>

        <div class="table-container">
            <table id="studentTable">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $status_class = $row['status'] == 'Aktif' ? 'status-aktif' : 'status-nonaktif';
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nis']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
                            echo "<td><span class='status " . $status_class . "'>" . $row['status'] . "</span></td>";
                            echo "<td class='actions'>";
                            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>";
                            echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-delete' id='btn-delete-" . $row['id'] . "'>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center;'>Belum ada data siswa</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#studentTable tbody tr');

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });

        // Delete confirmation
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!confirm('Yakin ingin menghapus?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
