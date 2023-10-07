# Task Management System

Task Management is a dashboard through it the can create tasks and assign it to users, also provide a helpful insights

## Requirements

* Laravel v10.x
* PHP v8.1 
* Extension php8.1-sqlite3

## Installation

1. Clone the repository:
   ```shell
   git clone git@github.com:Hossam-Tarek/task-management.git
   ```

2. Navigate to the project directory:
   ```shell
   cd task-management
   ```

3. Install dependencies using Composer:
   ```shell
   composer install
   ```

4. Create a `.env` file by copying `.env.example`:
   ```shell
   cp .env.example .env
   ```

5. Generate a new Laravel application key:
   ```shell
   php artisan key:generate
   ```

6. Create a fresh database and update the DB name in `.env` file

7. Migrate the DB and seed the data
   ```shell
   php artisan migrate:fresh --seed
   ```
8. Run the npm commands:
   ```shell
   npm install && npm run build
   ```
   
9. Start the Laravel development server:
   ```shell
   php artisan serve
   ```

## Usage

After installing the project go to the url `localhost:8000/admin` it will require you to login.

Email: `admin@admin.com`
Password: `12345678`
