# 📝 Laravel Blog Management System

This is a simple **Blog Management System** built with **Laravel 10**, featuring API and Blade-based frontend with best practices like the **Service-Repository pattern**, **Form Requests**, **Sanctum authentication**, and **Laravel Queues** for email notifications.

---

## 🚀 Features

### ✅ Core Features
- User Registration, Login, Logout (Laravel Sanctum + Breeze)
- Blog Posts (CRUD)
- Categories (CRUD)
- API Filtering:
  - Filter posts by **category**, **status**, and **title keyword**
- API Resources for JSON formatting
- Authenticated users can **create, update, and delete** only their posts
- Public API access to view latest posts

### 🧠 Best Practices Used
- Service Class & Repository Pattern
- Form Request Validation
- Laravel Queues for email (confirmation mail on registration)
- API authentication with Laravel Sanctum
- Blade-based and API-based implementations
- Clean code with pagination, error handling, and status responses
- Custom API Response Helper for unified JSON output

---

## 🛠️ Tech Stack

- Laravel 10
- MySQL
- Sanctum
- Breeze
- Bootstrap 5 (Blade UI)
- Postman (for API testing)

---

## 📁 Folder Structure (Key Parts)

