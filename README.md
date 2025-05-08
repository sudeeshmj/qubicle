🚀 Blog Management System (Laravel)
A simple and well-structured blog management system built with Laravel 10, supporting both Blade views and RESTful API. It includes user authentication, blog post management, categories with modern best practices like service-repository pattern and queues.

✨ Features
🧑‍💻 Authentication
Laravel Breeze UI-based auth (for blade views).

Laravel Sanctum for API token authentication.

Register, Login, Logout (API & Web).

📝 Blog Posts
Full CRUD for blog posts (title, slug, body, status, category).

Post Filtering via API by:

Category

Status

Keyword in title

Only the authenticated user can edit/delete their posts.

📂 Categories
CRUD functionality for managing categories.

Each post belongs to one category.


📬 Email Notification (Queue)
Sends a confirmation email to users upon registration via Laravel queues.

🔧 Technology & Best Practices
Laravel 10

Laravel Breeze (UI auth)

Laravel Sanctum (API auth)

Laravel Queues (Database driver)

Service & Repository Pattern

API Resources for consistent JSON formatting

Form Request validation

Bootstrap 5 + Blade for UI

Clean, modular code with exception handling

⚙️ Installation Instructions
bash
Copy
Edit
# Clone the repo
git clone https://github.com/your-username/blog-management.git
cd blog-management

# Install dependencies
composer install
npm install && npm run build

# Copy environment file and configure
cp .env.example .env
php artisan key:generate

# Set up database
# Update .env with DB credentials
php artisan migrate --seed

# Set up queue (Database)
php artisan queue:table
php artisan migrate
php artisan queue:work

# Start the server
php artisan serve
📮 Mail Configuration
In .env:

env
Copy
Edit
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME="Blog App"
Use Mailtrap or any SMTP provider.

🔐 Sanctum Token Usage (API)
Register API
POST /api/v1/register
Request:

json
Copy
Edit
{
  "name": "Test User",
  "email": "test@example.com",
  "password": "password",
  "password_confirmation": "password"
}
Login API
POST /api/v1/login

json
Copy
Edit
{
  "email": "test@example.com",
  "password": "password"
}
Use Token
Add this to headers:

css
Copy
Edit
Authorization: Bearer {token}
Logout API
POST /api/v1/logout

📘 API Endpoints Summary
Method	Endpoint	Description
GET	/api/v1/posts	List all posts (with filters)
POST	/api/v1/posts	Create post (auth required)
PUT	/api/v1/posts/{id}	Update own post (auth required)
DELETE	/api/v1/posts/{id}	Delete own post (auth required)
GET	/api/v1/categories	List all categories


📬 Contact
For questions, feel free to raise an issue or contact [sudeeshmj@gmail.com].

