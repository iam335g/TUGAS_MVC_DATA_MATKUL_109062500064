# MVC PHP Native - Data Mata Kuliah

Aplikasi CRUD sederhana untuk mengelola data mata kuliah menggunakan pola arsitektur Model-View-Controller (MVC) pada PHP Native.

## Kebutuhan Sistem
- PHP 8.0 atau lebih baru
- MySQL / MariaDB
- Web Server Lokal (Laragon / XAMPP)
- Git

## Petunjuk Instalasi & Penggunaan
1. Clone atau salin folder proyek `data_mata_kuliah` ke folder web server (`C:\laragon\www\` atau `htdocs`).
2. Impor berkas database `database/kampus.sql` melalui phpMyAdmin.
3. Sesuaikan konfigurasi koneksi database pada file `config/database.php`.
4. Buka aplikasi melalui browser pada URL:
   `http://localhost/data_mata_kuliah/public/index.php`

## Struktur Folder MVC
- `app/controllers/` : Menangani request, alur logika aplikasi, dan pemanggilan Model/View.
- `app/models/`      : Mengelola logika data dan kueri database (PDO).
- `app/views/`       : Menampilkan antarmuka HTML kepada pengguna.
- `config/`          : Konfigurasi koneksi database PDO.
- `database/`        : Skema SQL dan data awal database.
- `public/`          : Entry point utama aplikasi (front controller & router).

## Fitur Utama
- Menampilkan daftar data mata kuliah
- Menambah data mata kuliah baru
- Mengubah/memperbarui data mata kuliah
- Menghapus data mata kuliah

## Histori Pengembangan Git
Gunakan perintah berikut di terminal untuk melihat riwayat commit:
```bash
git log --oneline --graph --decorate