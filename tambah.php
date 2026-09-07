<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nis = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $query = "INSERT INTO siswa (nis, nama_lengkap, kelas, jurusan, status) 
              VALUES ('$nis', '$nama', '$kelas', '$jurusan', '$status')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #667eea;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-cancel {
            width: 100%;
            padding: 12px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>➕ Tambah Siswa Baru</h2>
        <form method="POST">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" required placeholder="Masukkan NIS">
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" required placeholder="Contoh: X, XI, XII">
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" required placeholder="Masukkan jurusan">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn-submit">Simpan</button>
            <a href="index.php" class="btn-cancel">Kembali</a>
        </form>
    </div>
</body>
</html>
