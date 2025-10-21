
# Task Management Application (Laravel 12+)

This is a full-featured Task Management Web Application built with **Laravel 12**, **MySQL**, **Laravel Breeze**, and **Tailwind CSS**. It allows users to create, manage, and track tasks with priority levels and status updates.

---

## 🛠️ Technologies Used

- Laravel 12+
- Laravel Breeze (Authentication Scaffolding)
- Tailwind CSS (Frontend Styling)
- MySQL (Relational Database)
- Eloquent ORM
- Blade Templating Engine
- Vite + PostCSS (for asset bundling)

---

## 🚀 Features

- User Registration and Login (Laravel Breeze)
- Create, Edit, Delete Tasks
- Assign Task Priority and Status (Pending, In Progress, Completed)
- Role-based Access (Admin, Team Member, Guest)
- Blade-based UI using Tailwind CSS
- Request Validation
- Database Seeding with Factory
- Custom Middleware and Named Routes

---

## 🧑‍💻 Installation Guide

1. **Clone this repository**
   ```bash
   git clone [YOUR_REPO_URL]
   cd task-management-app
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment setup**
   - Copy `.env.example` to `.env`
   - Update database credentials in `.env`
   - Run the following:
     ```bash
     php artisan key:generate
     php artisan migrate --seed
     ```

4. **Run the application**
   ```bash
   php artisan serve
   ```

Visit: `http://localhost:8000`

---

## 📂 Database

The app uses MySQL. The database schema includes:
- `users` – default Laravel users table
- `tasks` – stores task details (title, description, status, priority, etc.)

---

## 📝 Notes

- No external HTML/CSS template was used. UI is custom-built with Blade and Tailwind CSS.
- You must configure SMTP settings in `.env` for email features 
