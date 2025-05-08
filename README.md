# 📝 Laravel Blog Management System

A simple blog management system built using Laravel 10. It includes both API and Blade-based frontend, using Laravel best practices like service-repository pattern, API resources, form requests, and queues.

---

## 🚀 Features

### ✅ Core Features

- User registration, login, and logout (Sanctum + Breeze)
- Blog post CRUD (Create, Read, Update, Delete)
- Categories CRUD
- Filter posts by:
  - Category
  - Status (draft/published)
  - Keyword in title
- Public post listing (no auth required)
- Only authenticated users can create/update/delete their own posts

### 🧠 Best Practices Used

- Service and Repository pattern
- Form Requests for validation
- API Resource classes for JSON formatting
- Laravel Queues for registration confirmation email
- Custom API Response helper
- Sanctum token-based authentication
- Blade views for web UI

---

## 🛠️ Tech Stack

- Laravel 10
- Sanctum
- Laravel Breeze (for web auth)
- MySQL
- Bootstrap 5
- Laravel Queues
- Postman (for testing)

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/sudeeshmj/qubicle.git
cd qubicle
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Setup Environment

```bash
copy .env.example .env
php artisan key:generate
```

### 4. Configure `.env`

Update `.env` with your database and mail credentials:

```
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_user
MAIL_PASSWORD=your_mailtrap_pass
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME="Blog App"
```

### 5. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### 6. Run Application

```bash
php artisan serve
```

---

## 📬 Queue for Registration Email

To send confirmation email asynchronously via queue:

```bash
php artisan queue:work
```

> Make sure your mail configuration is set correctly.

---

## 📱 API Usage

### Base URL

```
http://localhost:8000/api/v1
```

### 🔐 Auth Endpoints

| Method | Endpoint      | Description         |
|--------|---------------|---------------------|
| POST   | `/register`   | Register a new user |
| POST   | `/login`      | Login and receive token |
| POST   | `/logout`     | Logout user         |

### 📝 Post Endpoints

| Method | Endpoint        | Auth | Description                       |
|--------|------------------|------|-----------------------------------|
| GET    | `/posts`         | ❌   | Public post list with filters     |
| POST   | `/posts`         | ✅   | Create a new post                 |
| PUT    | `/posts/{id}`    | ✅   | Update own post                   |
| DELETE | `/posts/{id}`    | ✅   | Delete own post                   |

#### 🔍 Filtering

Example:

```
GET /posts?status=published&category_id=3&keyword=laravel
```

### 📂 Category Endpoints

| Method | Endpoint       | Auth | Description        |
|--------|----------------|------|--------------------|
| GET    | `/categories`  | ❌   | List all categories|

---

## 📄 License

[MIT](LICENSE)
