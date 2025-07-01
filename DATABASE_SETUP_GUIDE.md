# Panduan Konfigurasi Database - Catering Plan Laravel App

## Langkah 1: Pilih Jenis Database

### Opsi A: SQLite (Recommended untuk Development)

SQLite adalah pilihan yang mudah untuk development karena tidak memerlukan instalasi server database terpisah.

#### 1.1 Konfigurasi .env untuk SQLite

Buka file `.env` Anda dan pastikan konfigurasi berikut:

```env
DB_CONNECTION=sqlite
# Hapus atau comment out baris berikut:
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

#### 1.2 Buat File Database SQLite

Jalankan perintah berikut di terminal untuk membuat file database:

```bash
# Buat file database SQLite kosong
touch database/database.sqlite

# Atau di Windows:
type nul > database\database.sqlite
```

#### 1.3 Set Permissions (Linux/Mac)

```bash
chmod 664 database/database.sqlite
chmod 775 database/
```

### Opsi B: MySQL

#### 1.1 Konfigurasi .env untuk MySQL

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=catering_plan
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

#### 1.2 Buat Database MySQL

Masuk ke MySQL dan buat database:

```sql
CREATE DATABASE catering_plan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

## Langkah 2: Generate Application Key

Jika belum ada APP_KEY di file .env:

```bash
php artisan key:generate
```

## Langkah 3: Clear Cache dan Config

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Langkah 4: Test Koneksi Database

```bash
php artisan tinker
```

Kemudian di dalam tinker:

```php
DB::connection()->getPdo();
// Jika berhasil, akan menampilkan object PDO
// Jika gagal, akan menampilkan error
exit
```

## Langkah 5: Jalankan Migrasi

```bash
# Jalankan migrasi untuk membuat tabel
php artisan migrate

# Jika ada error dan ingin reset:
php artisan migrate:fresh
```

## Langkah 6: Jalankan Seeder

```bash
# Jalankan seeder untuk data awal
php artisan db:seed

# Atau jalankan seeder spesifik:
php artisan db:seed --class=MealPlanSeeder
php artisan db:seed --class=AdminUserSeeder
```

## Langkah 7: Verifikasi Setup

```bash
# Check apakah tabel sudah terbuat
php artisan tinker
```

Di dalam tinker:

```php
// Check tabel users
\App\Models\User::count();

// Check tabel meal_plans
\App\Models\MealPlan::count();

// Check tabel subscriptions
\App\Models\Subscription::count();

exit
```

## Troubleshooting

### Error: "Database does not exist"

**Untuk SQLite:**
- Pastikan file `database/database.sqlite` ada
- Pastikan path di .env benar: `DB_DATABASE=/absolute/path/to/database/database.sqlite`

**Untuk MySQL:**
- Pastikan database sudah dibuat
- Pastikan kredensial di .env benar

### Error: "Access denied"

**Untuk MySQL:**
- Periksa username dan password di .env
- Pastikan user MySQL memiliki akses ke database

### Error: "SQLSTATE[HY000] [2002] Connection refused"

**Untuk MySQL:**
- Pastikan MySQL server berjalan
- Periksa host dan port di .env

### Error: "Class not found"

```bash
composer dump-autoload
php artisan config:clear
```

### Permission Error (SQLite)

```bash
# Linux/Mac
sudo chown -R www-data:www-data database/
sudo chmod -R 775 database/

# Atau untuk development:
sudo chmod 777 database/database.sqlite
```

## Perintah Lengkap untuk Setup Bersih

Jika ingin memulai dari awal:

```bash
# 1. Clear semua cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 2. Drop semua tabel dan buat ulang (HATI-HATI: akan menghapus semua data)
php artisan migrate:fresh

# 3. Jalankan seeder
php artisan db:seed

# 4. Test koneksi
php artisan tinker
```

## Konfigurasi Tambahan

### Untuk Production (MySQL)

```env
DB_CONNECTION=mysql
DB_HOST=your_production_host
DB_PORT=3306
DB_DATABASE=your_production_db
DB_USERNAME=your_production_user
DB_PASSWORD=your_secure_password

# Tambahan untuk production
APP_ENV=production
APP_DEBUG=false
```

### Backup Database (SQLite)

```bash
# Backup
cp database/database.sqlite database/backup_$(date +%Y%m%d_%H%M%S).sqlite

# Restore
cp database/backup_20250101_120000.sqlite database/database.sqlite
```

### Backup Database (MySQL)

```bash
# Backup
mysqldump -u username -p catering_plan > backup_$(date +%Y%m%d_%H%M%S).sql

# Restore
mysql -u username -p catering_plan < backup_20250101_120000.sql
```

## Catatan Penting

1. **Jangan commit file .env** - File ini berisi informasi sensitif
2. **Gunakan SQLite untuk development** - Lebih mudah dan cepat
3. **Gunakan MySQL untuk production** - Lebih robust dan scalable
4. **Selalu backup database** sebelum menjalankan migrasi di production
5. **Test koneksi database** sebelum deploy aplikasi

## Kontak Support

Jika masih mengalami masalah, periksa:
1. Log Laravel di `storage/logs/laravel.log`
2. Error log web server
3. Database error log

Semoga panduan ini membantu! 🚀
