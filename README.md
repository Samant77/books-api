<<<<<<< HEAD
# 📚 Books API 

## 🚀 Project Overview

This is a RESTful backend API built using Laravel 12.
It includes:

* JWT Authentication
* Books CRUD API
* Search & Pagination
* Soft Delete


## ⚙️ Installation Steps

```bash
git clone <your-repo-link>
cd books-api

composer install
cp .env.example .env
php artisan key:generate
```

---

## 🗄️ Database Setup

Update `.env`:

```
DB_DATABASE=books_api
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

---

## 🔐 JWT Setup

Install JWT:

```bash
composer require tymon/jwt-auth
```

Generate secret:

```bash
php artisan jwt:secret
```

---

## ▶️ Run Project

```bash
php artisan serve
```


## 📌 API Documentation

### 🔑 Authentication

#### Register

POST `/auth/register`

```json
{
  "name": "your name",
  "email": "yourgmail@gmail.com",
  "password": "xxxxxx"
}
```

#### Login

POST `/auth/login`

Response:

```json
{
  "token": "JWT_TOKEN"
}
```

#### Profile

GET `/auth/profile`
Header:

```
Authorization: Bearer TOKEN
```

---

### 📚 Books API

#### Add Book

POST `/books`

#### Get Books

GET `/books?search=abc&page=1`

#### Get Single Book

GET `/books/{id}`

#### Update Book

PUT `/books/{id}`

#### Delete Book (Soft Delete)

DELETE `/books/{id}`

---
=======
# books-api
Laravel JWT Books API
>>>>>>> aa017d73a12dde0e6f5e7dde8f216785bd444a50
