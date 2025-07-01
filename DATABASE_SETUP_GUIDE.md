# Panduan Setup Database untuk Catering Plan

Panduan ini menjelaskan cara mengkonfigurasi database untuk aplikasi Catering Plan menggunakan MySQL/MariaDB atau SQLite.

## 1. Konfigurasi MySQL/MariaDB

1. Pastikan MySQL/MariaDB sudah terinstall dan berjalan di komputer Anda.
2. Buat database baru, misal: `catering_plan`.
3. Buka file `.env` di root project Laravel Anda, lalu ubah bagian berikut:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=catering_plan
DB_USERNAME=root
DB_PASSWORD=your_password
```

- Ganti `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` sesuai konfigurasi database Anda.

## 2. Konfigurasi SQLite

1. Jalankan perintah berikut di root project untuk membuat file database SQLite:

   ```bash
   touch database/database.sqlite
   ```

2. Buka file `.env` dan ubah bagian berikut:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/ke/project/database/database.sqlite
```

- Pastikan path pada `DB_DATABASE` mengarah ke file `database.sqlite` yang sudah dibuat.

## 3. Langkah Akhir: Migrasi dan Seed Data

Setelah konfigurasi `.env` selesai, jalankan perintah berikut untuk membuat struktur tabel dan mengisi data awal:

```bash
php artisan migrate --seed
```

Perintah ini akan:
- Membuat seluruh tabel yang dibutuhkan aplikasi.
- Mengisi data awal seperti meal plan, admin user, dsb.

---

Jika ada error koneksi database, pastikan konfigurasi `.env` sudah benar dan database server berjalan. 