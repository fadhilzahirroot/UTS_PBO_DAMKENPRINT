<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Damken Print — Laravel

Nama  : Fadhil Zahiruddin Munawwar  
NIM   : 20251020034  
Prodi : Teknik Informatika  
Mata Kuliah: Pemrograman Berorientasi Objek  

---

## Tentang Proyek

Damken Print adalah aplikasi web sederhana berbasis Laravel 13 untuk mengelola **Data Karyawan** menggunakan operasi CRUD (Create, Read, Update, Delete). Data disimpan di session PHP tanpa database. Proyek ini dibuat sebagai tugas mata kuliah PBO untuk mempraktikkan konsep MVC (Model-View-Controller) menggunakan Laravel.

## Fitur

- Tambah data karyawan (Create)
- Lihat daftar dan detail karyawan (Read)
- Edit data karyawan (Update)
- Hapus data karyawan (Delete)
- Validasi input sisi server (Laravel Validation)
- Penyimpanan data berbasis session (tanpa database)

## Teknologi

- PHP 8.3+
- Laravel 13
- Blade Templating Engine
- CSS kustom (vanilla CSS, tanpa framework)
- Session storage

## Persyaratan

- PHP >= 8.3
- Composer
- Laragon (Windows)

## Cara Menjalankan

> Aplikasi ini menggunakan Laragon sebagai server lokal di Windows.

```bash
# 1. Clone repository ke folder www Laragon
cd C:\laragon\www
git clone https://github.com/fadhilzahirroot/UTS_PBO_DAMKENPRINT.git damkenprint-laravel
cd damkenprint-laravel

# 2. Install dependensi PHP
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Pastikan SESSION_DRIVER=file di .env
```

Setelah itu:
1. Buka aplikasi **Laragon** → klik **Start All**
2. Buka browser ke:

```
http://damkenprint-laravel.test/karyawan
```

> Laragon otomatis membuat virtual host `damkenprint-laravel.test` untuk setiap folder di dalam `C:\laragon\www`.
```

## Struktur File Utama

```
app/Http/Controllers/KaryawanController.php   ← logika CRUD
resources/views/karyawan/                     ← tampilan Blade
  ├── index.blade.php                         ← daftar karyawan
  ├── create.blade.php                        ← form tambah
  ├── edit.blade.php                          ← form edit
  └── show.blade.php                          ← detail karyawan
resources/views/layouts/app.blade.php         ← layout utama
routes/web.php                                ← definisi route
```

## Catatan

Data karyawan disimpan di **session PHP**, bukan di database. Data akan hilang saat session berakhir atau browser ditutup. Ini adalah desain yang disengaja sesuai batasan tugas.
