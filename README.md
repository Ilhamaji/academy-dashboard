<div align="center">

# Academy Dashboard

A **Laravel** school-administration app for tracking tuition (SPP) payments, expenses, and financial reports.

[![Status](https://img.shields.io/badge/status-complete-brightgreen?style=flat-square)](#)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)

**English** · [Bahasa Indonesia](README.id.md)

</div>

---

## About

Schools usually track tuition and expenses across a cash book or a handful of spreadsheets, which makes balances drift and history hard to audit. This app centralises it: every payment and expense lands in one database, is searchable, and exports to Excel or PDF.

## Modules

### Income

- Record tuition payments at `/transaksi/pembayaran` (create, edit, delete).
- CRUD for *income types* and their amounts at `/penerimaan`.
- Payment reports and per-income-type reports, each with a `/download` (Excel) variant.

### Expenses

- Record expenses at `/transaksi/pengeluaran` (create, edit, delete).
- CRUD for *expense types* at `/pengeluaran`.
- Expense reports and per-expense-type reports, with `/download` export.
- A PDF receipt per expense at `/laporan/pengeluaran/kwitansi/{id}`.

### Other receipts

- Record non-tuition income (`/transaksi/lain-lain`) with its own types and report.

### Students and classes

- Student records keyed by NISN: search, create, edit, delete.
- Class records: create, edit, delete (deletion is by class name).
- Student reports and per-class reports (`/laporan/kelas/{id}`), including per-student payment detail.

### Cash book

- A cash recap by date range with PDF download (`POST /kas/cari/download`).

### Users

- Login, registration, logout, and a profile page.

> **Note:** every route inside the `auth` group uses the same `auth` middleware. There is no role separation (admin/treasurer/teacher) — any account can reach every menu.

## Tech Stack

| Layer | Technology |
| --- | --- |
| Framework | Laravel |
| Language | PHP 8.2+ |
| Frontend | Blade + Tailwind CSS + Vite |
| Database | MySQL |
| Export | `maatwebsite/excel`, PDF |

## Getting Started

### 1. Prerequisites

- PHP 8.2+ with `pdo_mysql`, `mbstring`, `xml`, `gd`
- Composer, Node.js 18+, MySQL 8

### 2. Clone and install

```bash
git clone https://github.com/Ilhamaji/academy-dashboard.git
cd academy-dashboard
composer install
npm install
```

### 3. Configure

```bash
cp .env.example .env
php artisan key:generate
```

Point the database settings in `.env` at your instance:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=academy
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Load the database

The repo only ships a migration for the `users` table. For the full schema plus sample data, import the dump:

```bash
mysql -u root -p academy < academy.sql
```

Alternatively, run the minimal migration and create the `siswa`, `kelas`, `pembayaran`, `pengeluaran`, and `lain_lain` tables by hand, following `academy.sql`.

### 5. Run

```bash
npm run dev          # terminal 1
php artisan serve    # terminal 2
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) and register through `/register`.

## Route Map

| Group | Main routes |
| --- | --- |
| Auth | `/register`, `/login`, `/logout` |
| Dashboard | `/` |
| Students | `/siswa`, `/siswa/cari`, `/laporan/siswa` |
| Classes | `/kelas`, `/laporan/kelas/{id}` |
| Income | `/penerimaan` (types), `/transaksi/pembayaran`, `/laporan/pembayaran` |
| Expenses | `/pengeluaran` (types), `/transaksi/pengeluaran`, `/laporan/pengeluaran` |
| Other | `/transaksi/lain-lain`, `/laporan/lain-lain` |
| Cash book | `/kas`, `POST /kas/cari/download` |
| Info and profile | `/informasi`, `/profil` |

## Project Layout

```
app/
  Http/Controllers/     # Home, Siswa, Kelas, Pembayaran, Penerimaan,
                        # Pengeluaran, Lainnya, Detail, Kas, User, Auth
  Exports/              # class exports (7 Excel/PDF export files)
  Models/
routes/web.php          # all routes
resources/views/        # Blade templates
database/migrations/    # users only
academy.sql             # full schema and sample data dump
```

## License

MIT.

---

<div align="center">
Built by <a href="https://github.com/Ilhamaji">Ilham Aji</a>
</div>
