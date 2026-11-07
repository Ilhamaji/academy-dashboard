<div align="center">

# Academy Dashboard

Aplikasi administrasi sekolah berbasis **Laravel** untuk pencatatan pembayaran SPP, pengeluaran, dan laporan keuangan.

[![Status](https://img.shields.io/badge/status-complete-brightgreen?style=flat-square)](#)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)

</div>

---

## Tentang

Pencatatan SPP dan pengeluaran sekolah biasanya berjalan di buku kas atau spreadsheet terpisah, sehingga saldo mudah selisih dan riwayat sulit ditelusuri. Aplikasi ini memusatkannya: setiap pembayaran dan pengeluaran tercatat di satu database, bisa dicari, dan diekspor ke Excel maupun PDF.

## Modul

### Penerimaan

- Pencatatan pembayaran SPP di `/transaksi/pembayaran` (tambah, ubah, hapus).
- CRUD *jenis penerimaan* beserta nominal, di `/penerimaan`.
- Laporan pembayaran dan laporan per jenis penerimaan, masing-masing punya versi `/download` (Excel).

### Pengeluaran

- Pencatatan pengeluaran di `/transaksi/pengeluaran` (tambah, ubah, hapus).
- CRUD *jenis pengeluaran* di `/pengeluaran`.
- Laporan pengeluaran dan laporan per jenis pengeluaran, dengan ekspor `/download`.
- Kwitansi PDF per pengeluaran di `/laporan/pengeluaran/kwitansi/{id}`.

### Lain-lain

- Pencatatan penerimaan lain di luar SPP (`/transaksi/lain-lain`), dengan jenis dan laporannya sendiri.

### Data Siswa & Kelas

- Data siswa dengan NISN sebagai kunci: cari, tambah, ubah, hapus.
- Data kelas: tambah, ubah, hapus (hapus berdasarkan nama kelas).
- Laporan siswa dan laporan per kelas (`/laporan/kelas/{id}`), termasuk rincian pembayaran per siswa.

### Buku Kas

- Rekap kas berdasarkan rentang tanggal, dengan unduhan PDF (`POST /kas/cari/download`).

### Pengguna

- Login, register, logout, dan halaman profil.

> **Catatan:** semua route di dalam grup `auth` memakai middleware `auth` yang sama. Belum ada pembedaan peran (admin/bendahara/guru) — siapa pun yang punya akun bisa mengakses seluruh menu.

## Tech Stack

| Bagian | Teknologi |
| --- | --- |
| Framework | Laravel |
| Bahasa | PHP 8.2+ |
| Frontend | Blade + Tailwind CSS + Vite |
| Database | MySQL |
| Ekspor | `maatwebsite/excel`, PDF |

## Menjalankan

### 1. Prasyarat

- PHP 8.2+ dengan ekstensi `pdo_mysql`, `mbstring`, `xml`, `gd`
- Composer, Node.js 18+, MySQL 8

### 2. Clone & install

```bash
git clone https://github.com/Ilhamaji/academy-dashboard.git
cd academy-dashboard
composer install
npm install
```

### 3. Konfigurasi

```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan database di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=academy
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Muat database

Repo hanya menyertakan migration untuk tabel `users`. Untuk skema lengkap beserta data contoh, impor dump:

```bash
mysql -u root -p academy < academy.sql
```

Atau jalankan migration minimal, lalu buat tabel `siswa`, `kelas`, `pembayaran`, `pengeluaran`, dan `lain_lain` secara manual mengacu ke `academy.sql`.

### 5. Jalankan

```bash
npm run dev          # terminal 1
php artisan serve    # terminal 2
```

Buka [http://127.0.0.1:8000](http://127.0.0.1:8000), lalu daftar akun lewat `/register`.

## Peta Route

| Grup | Route utama |
| --- | --- |
| Auth | `/register`, `/login`, `/logout` |
| Dashboard | `/` |
| Siswa | `/siswa`, `/siswa/cari`, `/laporan/siswa` |
| Kelas | `/kelas`, `/laporan/kelas/{id}` |
| Penerimaan | `/penerimaan` (jenis), `/transaksi/pembayaran`, `/laporan/pembayaran` |
| Pengeluaran | `/pengeluaran` (jenis), `/transaksi/pengeluaran`, `/laporan/pengeluaran` |
| Lain-lain | `/transaksi/lain-lain`, `/laporan/lain-lain` |
| Kas | `/kas`, `POST /kas/cari/download` |
| Informasi & profil | `/informasi`, `/profil` |

## Struktur

```
app/
  Http/Controllers/     # Home, Siswa, Kelas, Pembayaran, Penerimaan,
                        # Pengeluaran, Lainnya, Detail, Kas, User, Auth
  Exports/              # kelas (7 file ekspor Excel/PDF)
  Models/
routes/web.php          # seluruh route
resources/views/        # template Blade
database/migrations/    # hanya users
academy.sql             # dump skema + data lengkap
```

## Lisensi

MIT.

---

<div align="center">
Dibuat oleh <a href="https://github.com/Ilhamaji">Ilham Aji</a>
</div>
