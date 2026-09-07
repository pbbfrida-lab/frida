# Rencana Pengembangan Aplikasi Data Siswa

## Ringkasan

Aplikasi ini adalah CRUD sederhana untuk mengelola data siswa menggunakan PHP native, MySQL, HTML, dan CSS. Dokumen ini menjadi backlog kerja yang dapat dikerjakan bertahap oleh junior programmer atau AI dengan biaya rendah.

## Tujuan MVP

- Pengguna dapat melihat daftar siswa.
- Pengguna dapat mencari siswa.
- Pengguna dapat menambah, mengubah, dan menghapus data siswa.
- Data tersimpan konsisten di MySQL.
- Input dan akses data memiliki perlindungan dasar.
- Proyek dapat dijalankan ulang oleh developer lain berdasarkan dokumentasi.

## Kondisi Saat Ini

- [x] Halaman daftar siswa tersedia di `index.php`.
- [x] Form tambah tersedia di `tambah.php`.
- [x] Form edit tersedia di `edit.php`.
- [x] Hapus data tersedia di `hapus.php`.
- [x] Koneksi database tersedia di `config.php`.
- [ ] Schema database dan data contoh terdokumentasi.
- [ ] Validasi server-side lengkap.
- [ ] Prepared statement digunakan pada semua query.
- [ ] Konfirmasi hapus dan CSRF protection tersedia.
- [ ] Pengujian manual/regresi terdokumentasi.

## Tahapan Pengerjaan

### Tahap 1: Persiapan dan Dokumentasi

- [ ] Buat `README.md` berisi kebutuhan PHP/MySQL, cara menjalankan proyek, dan struktur folder.
- [ ] Buat file `database.sql` berisi database `frida1`, tabel `siswa`, index, dan data contoh.
- [ ] Tambahkan `.env.example` atau instruksi konfigurasi database tanpa menyimpan password asli.
- [ ] Catat versi PHP dan MySQL yang digunakan saat pengujian.

**Selesai jika:** developer baru dapat menjalankan aplikasi lokal hanya dengan mengikuti README.

### Tahap 2: Pastikan CRUD Dasar Stabil

- [ ] Pastikan daftar siswa menampilkan data kosong dengan pesan yang jelas.
- [ ] Pastikan tambah data berhasil dan kembali ke halaman daftar.
- [ ] Pastikan edit data yang valid berhasil.
- [ ] Pastikan ID yang tidak ditemukan tidak menyebabkan halaman PHP warning/error.
- [ ] Pastikan hapus hanya menghapus data dengan ID yang dipilih.
- [ ] Tampilkan pesan sukses dan gagal yang konsisten.

**Selesai jika:** alur lihat, tambah, edit, dan hapus dapat diuji berulang tanpa error pada data valid maupun tidak valid.

### Tahap 3: Keamanan dan Validasi Input

- [ ] Ganti query dinamis dengan prepared statement.
- [ ] Validasi `id` sebagai integer sebelum dipakai pada query.
- [ ] Validasi field wajib, panjang teks, format NIS, dan nilai status di sisi server.
- [ ] Escape seluruh data saat ditampilkan kembali ke HTML menggunakan `htmlspecialchars`.
- [ ] Tambahkan token CSRF pada form tambah, edit, dan hapus.
- [ ] Ubah penghapusan dari GET menjadi POST agar tidak terpicu hanya karena membuka URL.
- [ ] Jangan menampilkan detail error database kepada pengguna pada lingkungan produksi.

**Selesai jika:** input tidak valid ditolak dengan pesan yang aman dan query tidak membangun SQL dari input mentah pengguna.

### Tahap 4: Perbaikan Pengalaman Pengguna

- [ ] Tambahkan konfirmasi sebelum menghapus data.
- [ ] Pertahankan kata kunci pencarian setelah form dikirim.
- [ ] Tambahkan pagination jika jumlah siswa mulai banyak.
- [ ] Pastikan tabel tetap dapat digunakan pada layar ponsel.
- [ ] Gunakan label form yang jelas dan pesan error di dekat field yang bermasalah.
- [ ] Hindari duplikasi CSS antara `index.php`, `tambah.php`, dan `edit.php` dengan memindahkannya ke file stylesheet.

**Selesai jika:** pengguna dapat memahami hasil setiap aksi dan tampilan tetap usable pada desktop serta mobile.

### Tahap 5: Pengujian dan Kualitas Kode

- [ ] Buat checklist pengujian manual untuk semua alur CRUD.
- [ ] Uji input kosong, karakter khusus, NIS duplikat, ID tidak valid, dan data sangat panjang.
- [ ] Uji pencarian dengan kata kunci yang tidak ditemukan.
- [ ] Uji akses langsung ke `edit.php` dan `hapus.php` tanpa parameter atau dengan ID palsu.
- [ ] Rapikan kode berulang dengan helper sederhana jika memang mengurangi duplikasi.
- [ ] Pastikan tidak ada warning/error PHP pada alur normal.

**Selesai jika:** checklist lulus dan setiap bug yang ditemukan memiliki issue atau commit perbaikan yang jelas.

### Tahap 6: Rilis dan Pemeliharaan

- [ ] Buat branch atau tag rilis pertama, misalnya `v1.0.0`.
- [ ] Perbarui README dengan batasan aplikasi dan langkah backup database.
- [ ] Pastikan konfigurasi produksi tidak memakai password kosong.
- [ ] Dokumentasikan cara rollback sederhana dan cara melaporkan bug.
- [ ] Review pull request menggunakan checklist keamanan dan pengujian.

**Selesai jika:** aplikasi siap dipindahkan dari lokal ke server dengan konfigurasi yang terdokumentasi.

## Urutan Prioritas

1. **P0 - Wajib:** schema database, README, stabilisasi CRUD, prepared statement, validasi input, dan escaping output.
2. **P1 - Penting:** CSRF, hapus via POST, penanganan ID tidak valid, konfirmasi hapus, dan checklist pengujian.
3. **P2 - Peningkatan:** pagination, ekstraksi CSS, pesan UI yang lebih baik, backup, dan deployment.

## Aturan Kerja untuk Junior Programmer atau AI Hemat

- Kerjakan satu checkbox dalam satu pull request kecil.
- Baca file terkait sebelum mengubah kode.
- Jangan mengubah struktur database tanpa memperbarui `database.sql` dan README.
- Setelah setiap perubahan, jalankan pengujian manual yang paling dekat dengan perubahan tersebut.
- Jangan menambahkan library baru jika PHP native sudah cukup.
- Gunakan pesan commit yang menjelaskan satu perubahan, misalnya `fix: validate student id`.
- Jika menemukan pekerjaan di luar scope, buat issue baru daripada memperbesar perubahan saat ini.

## Definisi Selesai Umum

Task dianggap selesai jika:

- implementasi sudah dibuat dan hanya menyentuh scope task;
- alur terkait berhasil diuji;
- tidak ada error PHP baru;
- dokumentasi diperbarui bila perilaku atau setup berubah;
- perubahan dapat direview melalui commit atau pull request yang jelas.
