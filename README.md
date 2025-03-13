# Stamp Collection System

## Overview
The **Stamp Collection System** is a Laravel-based web application that allows users to collect and manage stamps digitally. The system features **admin and customer roles**, enabling administrators to manage users and stamps while customers can collect stamps.

## Features
### Admin Features
- View all users and their collected stamps
- Create, edit, and delete users
- Manage stamps (create, edit, delete)
- Assign stamps to users

### Customer Features
- View available stamps
- Collect stamps by scanning a unique identifier
- View collected stamps

## Installation & Setup
### Prerequisites
Ensure you have the following installed:
- **PHP 8+**
- **Composer**
- **Laravel 10+**
- **MySQL** (or another supported database)
- **Node.js & NPM** (for frontend assets)

### Installation Steps
1. **Clone the Repository**
   ```sh
   git clone https://github.com/FawazSIT/stamp-collection.git
   cd stamp-collection-system
   ```

2. **Install Dependencies**
   ```sh
   composer install
   npm install
   ```

3. **Configure Environment**
   - Copy the `.env.example` file and rename it to `.env`.
   - Update the database credentials in `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=stamp_db
     DB_USERNAME=root
     DB_PASSWORD=yourpassword
     ```

4. **Generate Application Key**
   ```sh
   php artisan key:generate
   ```

5. **Run Migrations**
   ```sh
   php artisan migrate
   ```

6. **Seed the Database (For Admin Account)**
   ```sh
   php artisan db:seed --class=UserSeeder
   ```
   - This creates an admin account:
     - **Email:** `admin@test.com`
     - **Password:** `12345678`

7. **Run the Application**
   ```sh
   php artisan serve
   ```
   - The application will be available at **http://127.0.0.1:8000**

## Usage
### Admin
- Login as `admin@test.com` (password: `12345678`).
- Manage users and stamps via the dashboard.

### Customer
- Register as a new user.
- View available stamps and collect them.

## API Endpoints
| Method | Endpoint | Description |
|--------|---------|-------------|
| GET | `/dashboard` | Redirects user to their respective dashboard |
| DELETE | `/profile` | Delete user account |
| POST | `/admin/stamps/create` | Creates a new stamp |
| GET | `/admin/stamps/edit/{id}` | Retrieve stamp details for editing |
| PUT | `/admin/stamps/update/{id}` | Updates an existing stamp |
| DELETE | `/admin/stamps/delete/{id}` | Deletes a stamp |
| GET | `/admin/editUser/{id}` | Retrieve user details for editing |
| PUT | `/admin/editUser/{id}` | Update user details |
| DELETE | `/admin/deleteUser/{id}` | Deletes a user |
| GET | `/customer/collectstamp/{id}` | Collects a stamp |

## Contributing
Feel free to fork this repository and submit a pull request. Contributions are welcome!