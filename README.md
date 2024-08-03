<p align="center">
    <a href="#" target="_blank">
        Task Management System
    </a>
</p>

## Features
- Website

## Requirements
- PHP 8
- [node](https://nodejs.org/)
- npm
- composer

## Clone
You have to clone this repo using either `HTTPS` or `SSH`

- HTTPS
```bash
git clone https://github.com/adaugochi/task-management.git
```

- SSH
```bash
git clone git@github.com:adaugochi/task-management.git
```

## Install Dependencies
#### Composer Dependencies
```bash
composer install
```

#### Node.js Dependencies
```bash
npm install
```

## Environment Variables
Make a copy of `.env.example` to `.env` in the env directory.

## Setup Database

#### Create Database
```sql
CREATE DATABASE task_ms_app CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;
```

### Migration
```bash
php artisan migrate
```

### Seeder
```bash
php artisan db:seed --class=ProjectsTableSeeder
```

## Run Vite
You can compile your scss file to css using:

```bash
npm run dev
```

## Starting the Application
You can run the application in development mode by running this command from the project directory:

```bash
php artisan serve
```

## Author of README.md
- Maryfaith Mgbede <[adaamgbede@gmail.com](mailto:adaamgbede@gmail.com)>

## Credits
- Maryfaith Mgbede <[adaamgbede@gmail.com](mailto:adaamgbede@gmail.com)>


## Code of Conduct
In order to ensure that the Laravel community is welcoming to all, please review and
abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).
