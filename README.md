# Mini E-Commerce Assessment (Laravel 13)

Welcome to the QA Technical Assessment project. This repository contains a simplified Shopping Cart application designed to evaluate your testing skills (Manual, API, UI/UX, and SQL).

---

## 📖 Feature Documentation (READ THIS FIRST)

Before you begin testing, please read the **[Detailed Feature Documentation (FEATURE_DOCS.md)](FEATURE_DOCS.md)**. 

This document contains the official requirements and business rules for the application. Your task is to verify if the current implementation matches these requirements.

---

## 🚀 Quick Installation Guide

Follow these steps to set up the project on your local machine.

### 1. Prerequisites
Before starting, ensure you have these installed:
- **PHP 8.3** or higher
- **Composer** (PHP Package Manager)
- **Node.js & NPM**
- **SQLite**

### 2. Step-by-Step Setup

Open your terminal in the project folder and run the following commands in order:

```bash
# 1. Install dependencies
composer install
npm install

# 2. Setup Environment
cp .env.example .env
php artisan key:generate

# 3. Setup Database (SQLite)
# This will create the database and fill it with sample data
php artisan migrate:fresh --seed
```

### 3. Running the Application

To access the website, you need to start the local server:

```bash
# Start the Laravel server
php artisan serve
```
The app will be available at: **[http://localhost:8000](http://localhost:8000)**

*(Note: If you are testing the UI/Frontend, keep this terminal running.)*

---

## 🛠 Testing Tools & Access

### 1. Web Interface (UI)
- **Home:** `http://localhost:8000`
- **Shopping Cart:** `http://localhost:8000/cart`
- **Default Credentials:** `admin@example.com` / `password`

### 2. API Endpoints
You can test these using Postman, Insomnia, or `curl`:
- **Get Cart Items:** `GET /api/cart?user_id=1`
- **Add Item to Cart:** `POST /api/cart/add`
    - Body (JSON): `{"product_id": 1, "quantity": 2, "user_id": 1}`

---

## 💾 Database Access
To inspect the database state via terminal:
```bash
# Using SQLite CLI
sqlite3 database/database.sqlite
```
*If you don't have sqlite3 installed, you can use any SQLite Browser tool and open the `database/database.sqlite` file.*

---

## ❓ Troubleshooting
- **Database Error:** Ensure the file `database/database.sqlite` exists. If not, run `touch database/database.sqlite`.
- **Vite/CSS Error:** If the page looks unstyled, run `npm run build` to compile the assets.
- **Port 8000 Busy:** If the port is taken, use `php artisan serve --port=8001`.

---

## 📝 Submission Requirements
Candidates **MUST** include the following in their final submission:
1. **Test Scenario/Case Document** (Must include **Positive & Negative** cases).
2. **Bug Report List** (for all found issues).
3. **SQL Script/Snippet** (used for database verification).
4. **Evidence Folder** (Screenshots, recordings, or logs for each bug found).
