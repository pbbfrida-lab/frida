# Aplikasi Data Siswa

Aplikasi CRUD sederhana untuk mengelola data siswa menggunakan PHP native, MySQL, HTML, dan CSS.

## Fitur

- Menampilkan daftar siswa.
- Mencari data siswa.
- Menampilkan statistik jumlah siswa, siswa aktif, siswa nonaktif, dan jumlah kelas.
- Menambah data siswa.
- Mengubah data siswa.
- Menghapus data siswa.

## Kebutuhan Sistem

- PHP 7.4 atau lebih baru.
- MySQL 5.7 atau lebih baru atau MariaDB yang kompatibel.
- Apache atau web server lain.
- Laragon direkomendasikan untuk pengembangan lokal di Windows.

## Struktur File

| File | Keterangan |
| --- | --- |
| `config.php` | Konfigurasi dan koneksi database. |
| `index.php` | Halaman daftar, pencarian, statistik, dan aksi data. |
| `tambah.php` | Form untuk menambah siswa. |
| `edit.php` | Form untuk mengubah siswa. |
| `hapus.php` | Proses menghapus siswa. |
| `index1.html` | Salinan statis tampilan halaman utama. |
| `issue.md` | Rencana tahapan pengembangan proyek. |

## Setup Database

Buat database dan tabel berikut di MySQL atau phpMyAdmin:

```sql
CREATE DATABASE IF NOT EXISTS frida1
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE frida1;

CREATE TABLE IF NOT EXISTS siswa (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(30) NOT NULL,
    nama_lengkap VARCHAR(150) NOT NULL,
    kelas VARCHAR(30) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    status ENUM('Aktif', 'Non-Aktif') NOT NULL DEFAULT 'Aktif',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_siswa_nis (nis),
    INDEX idx_siswa_nama (nama_lengkap),
    INDEX idx_siswa_status (status)
);
```

Tambahkan data contoh jika diperlukan:

```sql
INSERT INTO siswa (nis, nama_lengkap, kelas, jurusan, status) VALUES
('1001', 'Budi Santoso', 'X', 'Rekayasa Perangkat Lunak', 'Aktif'),
('1002', 'Siti Aminah', 'XI', 'Akuntansi', 'Aktif');
```

## Konfigurasi Koneksi

Sesuaikan nilai koneksi pada `config.php` dengan instalasi lokal:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "frida1";
```

Jangan memakai password kosong di lingkungan produksi. Untuk deployment, simpan kredensial di konfigurasi server atau environment variable yang tidak di-commit ke Git.

## Menjalankan di Laragon

1. Letakkan folder proyek di `C:\laragon\www\frida`.
2. Jalankan Apache dan MySQL melalui Laragon.
3. Buat database dan tabel menggunakan SQL pada bagian setup database.
4. Periksa konfigurasi pada `config.php`.
5. Buka `http://localhost/frida/` di browser.

## Alur Penggunaan

1. Buka halaman utama untuk melihat daftar dan mencari siswa.
2. Pilih **Tambah Siswa** untuk menyimpan data baru.
3. Pilih **Edit** pada baris siswa untuk mengubah data.
4. Pilih **Hapus** untuk menghapus data yang dipilih.

## Catatan Pengembangan

- Aplikasi ini masih menggunakan PHP native dan query MySQLi sederhana.
- Validasi server-side, prepared statement, CSRF protection, dan penghapusan melalui POST merupakan pekerjaan lanjutan yang tercatat di `issue.md`.
- Setiap perubahan sebaiknya diuji pada alur CRUD yang terdampak dan dibuat dalam Pull Request kecil.
