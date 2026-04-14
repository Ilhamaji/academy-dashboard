# <img src="[https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20Logo%20Vertical/1%20Logo%20Vertical%20-%20Black.svg](https://www.google.com/search?q=https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%2520SVG/2%2520Logo%2520Vertical/1%2520Logo%2520Vertical%2520-%2520Black.svg)" alt="Laravel Logo" width="36" height="36" align="top" /> Academy Dashboard

A robust and scalable academic management system built with **Laravel**. This dashboard provides a centralized platform for managing student data, course enrollments, and academic reporting with an emphasis on performance and security.

**Demo:** [https://academy-dashboard-ilham.netlify.app](https://www.google.com/search?q=https://academy-dashboard-ilham.netlify.app) *(Note: Netlify is usually for frontend, adjust this if you are hosting on Heroku/Railway/VPS)*

## 🚀 Features

  * **Student Information System**: Comprehensive management of student profiles and academic records.
  * **Course & Curriculum Management**: Tools to organize classes, subjects, and teacher assignments.
  * **Reporting Tools**: Generate academic reports and monitor institutional KPIs.
  * **Secure Authentication**: Built-in Laravel authentication and role-based access control (RBAC).
  * **Eloquent ORM**: Optimized database interactions for seamless data handling.

## 🛠️ Built With

  * **Framework**: [Laravel 10.x / 11.x](https://laravel.com)
  * **Frontend**: Blade Templating / [Livewire / Inertia.js - *Pilih salah satu*]
  * **Styling**: Tailwind CSS
  * **Database**: MySQL / PostgreSQL

## 📦 Installation

Ikuti langkah-langkah berikut untuk menjalankan project ini di environment lokal Anda:

1.  **Clone the repository**

    ```bash
    git clone https://github.com/Ilhamaji/academy-dashboard.git
    cd academy-dashboard
    ```

2.  **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda:

    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations & Seeding**

    ```bash
    php artisan migrate --seed
    ```

6.  **Compile Assets**

    ```bash
    npm run dev
    ```

## 📋 Usage

Jalankan server pengembangan lokal:

```bash
php artisan serve
```

Aplikasi akan dapat diakses di `http://127.0.0.1:8000`.

## 🤝 Contributing

Jika Anda ingin berkontribusi:

1.  Fork Project ini.
2.  Buat Feature Branch (`git checkout -b feature/NewFeature`).
3.  Commit perubahan Anda (`git commit -m 'Add some NewFeature'`).
4.  Push ke Branch (`git push origin feature/NewFeature`).
5.  Open a Pull Request.

## 📄 License

Distributed under the **MIT License**. Lihat file `LICENSE` untuk informasi lebih lanjut.

## ✉️ Contact

**Ilham Aji** - [GitHub Profile](https://www.google.com/search?q=https://github.com/Ilhamaji)  
Project Link: [https://github.com/Ilhamaji/academy-dashboard](https://www.google.com/search?q=https://github.com/Ilhamaji/academy-dashboard)

-----

*Disclaimer: This dashboard is built as a part of a professional web development portfolio for educational management systems.*
