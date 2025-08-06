Smart Memory – Laravel Backend
Smart Memory is a secure and intelligent backend API built with Laravel, designed to help users capture, organize, search, and retrieve personal items, notes, and locations.
This backend powers the Smart Memory platform, offering authentication, secure storage, search functionality, and file uploads.

🚀 Features
🔐 User Authentication & Authorization

Register, login, and logout securely

Token-based authentication with Laravel Sanctum

CSRF protection & session invalidation on logout

📦 Item Management

Create, read, update, and delete (CRUD) personal items

Optional image upload for each item

Store metadata: name, location, notes

🔍 Search

Search items by keyword

Filter results by authenticated user

🛡 Security

Form request validation for data integrity

Image size/type validation for uploads

Authorization checks for item updates/deletion

🛠 Tech Stack
Component	Technology
Backend	Laravel 11
Authentication	Laravel Sanctum
Database	MySQL 
Storage	Laravel Filesystem (Public Disk)
API Format	JSON (RESTful)

📂 Project Structure (Backend)
bash
Copy
Edit
app/
 ├── Http/
 │   ├── Controllers/
 │   │   ├── AuthController.php   # Authentication logic
 │   │   └── ItemController.php   # Item CRUD & search
 │   ├── Requests/
 │   │   ├── StoreItemRequest.php # Validation rules for creating items
 │   │   └── UpdateItemRequest.php# Validation rules for updating items
 ├── Models/
 │   ├── User.php
 │   └── Item.php
routes/
 ├── api.php                     # API routes
storage/
 ├── app/public/photos           # Uploaded item photos
⚡ API Endpoints
Auth
| Method | Endpoint    | Description            | Auth Required |
| ------ | ----------- | ---------------------- | ------------- |
| POST   | `/register` | Register a new user    | ❌             |
| POST   | `/login`    | Login and get token    | ❌             |
| POST   | `/logout`   | Logout and invalidate  | ✅             |
| GET    | `/user`     | Get authenticated user | ✅             |


Items
| Method | Endpoint              | Description             | Auth Required |
| ------ | --------------------- | ----------------------- | ------------- |
| GET    | `/items`              | List all user items     | ✅             |
| GET    | `/items/{id}`         | View single item        | ✅             |
| POST   | `/items`              | Create new item         | ✅             |
| PUT    | `/items/{id}`         | Update an item          | ✅             |
| DELETE | `/items/{id}`         | Delete an item          | ✅             |
| GET    | `/items/search?q=...` | Search items by keyword | ✅             |

📦 Installation & Setup
1️⃣ Clone the repository


git clone https://github.com/ispastro/smart_memory_API
cd  smart_memory_API
2️⃣ Install dependencies

bash

composer install
3️⃣ Environment setup

bash

cp .env.example .env
php artisan key:generate
Update .env with your database credentials and storage settings.

4️⃣ Run migrations

bash

php artisan migrate
5️⃣ Link storage for file uploads

bash

php artisan storage:link
6️⃣ Serve the application

bash

php artisan serve
The backend will be available at:


http://127.0.0.1:8000
🔑 Authentication
All protected routes use Bearer Token authentication via Laravel Sanctum.
Include your token in the Authorization header:

http

Authorization: Bearer YOUR_TOKEN_HERE
📌 Notes
All image uploads are stored in storage/app/public/photos.

File validation ensures maximum size 2MB and type restrictions (jpg, jpeg, png, webp).

Only the authenticated user can access their items.

🤝 Contributing
Contributions are welcome!

Fork the repo

Create a new branch

Submit a pull request

📜 License
This project is licensed under the MIT License.











<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
