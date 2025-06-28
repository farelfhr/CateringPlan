# SEA Catering - Laravel Application

A comprehensive catering management system built with Laravel 11, featuring user authentication, subscription management, and admin dashboard functionality.

## 🚀 Features

### Level 1: Welcome to SEA Catering! (10 pts)
- ✅ Static homepage with business information
- ✅ Contact details and features section
- ✅ Responsive design with Tailwind CSS

### Level 2: Making It Interactive (20 pts)
- ✅ Responsive navigation with active page highlighting
- ✅ Interactive meal plan display with modals
- ✅ Testimonials section with submission form
- ✅ Mobile-friendly design

### Level 3: Building a Subscription System (25 pts)
- ✅ Dynamic subscription form with price calculation
- ✅ Database integration for meal plans, testimonials, and subscriptions
- ✅ Form validation and data persistence
- ✅ JavaScript-powered price calculation

### Level 4: Securing SEA (25 pts)
- ✅ User authentication with Laravel Breeze
- ✅ Authorization middleware for protected routes
- ✅ Input validation and sanitization
- ✅ XSS, SQL Injection, and CSRF protection
- ✅ User-subscription relationships

### Level 5: User & Admin Dashboard (20 pts)
- ✅ User dashboard for subscription management
- ✅ Admin dashboard with business metrics
- ✅ Pause/cancel subscription functionality
- ✅ Role-based access control

## 🛠️ Technology Stack

- **Backend**: Laravel 11
- **Frontend**: Blade templates with Tailwind CSS
- **Authentication**: Laravel Breeze
- **Database**: MySQL
- **JavaScript**: Alpine.js (included with Breeze)
- **Styling**: Tailwind CSS with pastel pink theme

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- MySQL database
- Git

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd CateringPlan
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Edit `.env` file and set your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sea_catering_db
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database**
   ```bash
   php artisan db:seed
   ```

8. **Build frontend assets**
   ```bash
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Access the application**
    Open your browser and navigate to `http://127.0.0.1:8000`

## 👥 Default Accounts

### Admin Account
- **Email**: admin@seacatering.com
- **Password**: password
- **Role**: admin

### Regular User
- Register a new account at `/register` or use any email to create a new user account.

## 🔐 Security Implementation

### XSS Protection
- Laravel's Blade templating engine automatically escapes output using `{{ }}`
- All user-supplied data is properly escaped to prevent XSS attacks

### SQL Injection Protection
- Laravel's Eloquent ORM uses parameterized queries
- All database interactions use Eloquent models with proper validation

### CSRF Protection
- Laravel automatically includes CSRF protection for all POST, PUT, PATCH, DELETE requests
- All forms include `@csrf` directive

### Authentication & Authorization
- Laravel Breeze provides secure authentication
- Role-based access control with Gates and Policies
- Protected routes using middleware

## 📁 Project Structure

```
CateringPlan/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/           # Breeze authentication controllers
│   │   ├── AdminDashboardController.php
│   │   ├── ContactUsController.php
│   │   ├── MealPlanController.php
│   │   ├── SubscriptionController.php
│   │   ├── UserDashboardController.php
│   │   └── WelcomeController.php
│   ├── Models/
│   │   ├── MealPlan.php
│   │   ├── Subscription.php
│   │   ├── Testimonial.php
│   │   └── User.php
│   └── Providers/
│       └── AuthServiceProvider.php
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   └── views/
│       ├── auth/          # Authentication views
│       ├── components/    # Blade components
│       ├── dashboard/     # Dashboard views
│       ├── meal_plans/    # Meal plan views
│       ├── contact_us/    # Contact views
│       ├── subscriptions/ # Subscription views
│       └── layouts/       # Layout templates
└── routes/
    ├── auth.php          # Authentication routes
    └── web.php           # Main application routes
```

## 🎨 Design Features

- **Color Scheme**: Pastel pink theme with professional styling
- **Responsive Design**: Mobile-first approach with Tailwind CSS
- **Interactive Elements**: Alpine.js for dynamic functionality
- **User Experience**: Intuitive navigation and form interactions

## 🔧 Development Commands

```bash
# Run migrations
php artisan migrate

# Run seeders
php artisan db:seed

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Build assets
npm run dev
npm run build

# Start development server
php artisan serve
```

## 📊 Database Schema

### Users Table
- id, name, email, password, role, email_verified_at, remember_token, created_at, updated_at

### Meal Plans Table
- id, name, price, description, full_details, image, created_at, updated_at

### Subscriptions Table
- id, user_id, name, phone, plan_id, meal_types (JSON), delivery_days (JSON), allergies, total_price, status, pause_start_date, pause_end_date, reactivated_at, created_at, updated_at

### Testimonials Table
- id, customer_name, review_message, rating, status, created_at, updated_at

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📝 License

This project is created for educational purposes as part of a Laravel development course.

## 🆘 Support

For any issues or questions, please refer to the Laravel documentation or create an issue in the repository.

---

**SEA Catering** - Healthy Meals, Anytime, Anywhere! 🍽️
