# Academy Dashboard

A powerful, all-in-one administrative platform built with **Laravel**. This system is designed to streamline school management, focusing on financial transparency, student administration, and classroom organization.

## 🚀 Key Modules & Features

### 💰 Financial Management & Reporting

  * **Payment Tracking**: Manage student tuition (SPP), enrollment fees, and other administrative payments.
  * **Financial Reports**: Generate automated reports for income and expenditures.
  * **Transaction History**: Secure and traceable logs for every financial activity.

### 🏫 Academic & Classroom Management

  * **Class Organization**: Manage class lists, grade levels, and homeroom teacher assignments.
  * **Student Directory**: Centralized database for student profiles, attendance, and academic status.
  * **Enrollment System**: Efficient workflow for registering and managing new student intakes.

### 🛠️ Administrative Tools

  * **Role-Based Access**: Secure login for Admins, Accountants, and Teachers with specific permissions.
  * **Data Visualization**: Quick-view dashboards for financial summaries and student statistics.

## 🛠️ Built With

  * **Backend**: [Laravel](https://laravel.com)
  * **Frontend**: Blade Templating
  * **Styling**: Tailwind CSS
  * **Database**: MySQL

## 📦 Installation

Follow these steps to set up the project locally:

1.  **Clone the repository**

    ```bash
    git clone https://github.com/Ilhamaji/academy-dashboard.git
    cd academy-dashboard
    ```

2.  **Install PHP & JS Dependencies**

    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    Copy the example environment file and configure your database settings:

    ```bash
    cp .env.example .env
    ```

4.  **Security & Database Initialization**

    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

5.  **Compile Assets**

    ```bash
    npm run dev
    ```

## 📋 Usage

Run the local development server:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

## 🤝 Contributing

Contributions are welcome to make this academy system even better.

1.  Fork the Project.
2.  Create your Feature Branch (`git checkout -b feature/NewFeature`).
3.  Commit your changes (`git commit -m 'Add some NewFeature'`).
4.  Push to the Branch (`git push origin feature/NewFeature`).
5.  Open a Pull Request.

## 📄 License

Distributed under the **MIT License**. See the `LICENSE` file for more information.

## ✉️ Contact

**Ilham Aji** - [GitHub Profile](https://www.google.com/search?q=https://github.com/Ilhamaji)  
Project Link: [https://github.com/Ilhamaji/academy-dashboard](https://www.google.com/search?q=https://github.com/Ilhamaji/academy-dashboard)

-----

*Disclaimer: This project is part of a professional web development portfolio focusing on institutional management solutions.*
