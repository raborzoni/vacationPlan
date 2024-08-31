# Documentation - Vacation Plan - Buzzvel

## Index
1. [Introduction](#1-introduction)
2. [Technologies Used](#2-technologies-used)
3. [Installation Requirements](#3-installation-requirements)
4. [Development Environment Setup](#4-development-environment-setup)
5. [Project Structure](#5-project-structure)
6. [Database Configuration](#6-database-configuration)
7. [API Routes and Endpoints](#7-api-routes-and-endpoints)
8. [Authentication](#8-authentication)
9. [Error Management](#9-error-management)
10. [Tests](#10-tests)
11. [Deployment](#11-deployment)
12. [Attachments and Resources](#12-attachments-and-resources)

## 1. Introduction
This document provides an overview of the system, covering its main functionalities, the architecture used, and how to configure, develop, and maintain the project. The system was developed using the Laravel framework and is intended for the creation of holiday plans, where the user can organize their holidays with the location of the destination, the date of the trip, and, if necessary, indicate if there will be any companions during the travels.

## 2. Technologies Used
- **Backend**: PHP 8.x, Laravel 9.x
- **Database**: MySQL 8.x
- **Other Libraries**: Laravel Passport for authentication, DomPDF for PDF generation
- **Web Server**: Apache (XAMPP)
- **Tools**: Composer, Git, Postman (for API testing)

## 3. Installation Requirements

### Necessary Software
- **PHP**: Version 8.x or higher
- **Composer**: To manage PHP dependencies
- **MySQL**: Version 8.x
- **Git**: For version control
- **Web Server**: Apache (via XAMPP or WAMP)

### Dependencies
- **Laravel Framework**
- **Laravel Passport**
- **DomPDF**

## 4. Development Environment Setup

### Clone the Repository
Clone the repository using the following command:
$ git clone https://github.com/raborzoni/vacationPlan.git
$ cd vacationPlan

### Install Project Dependencies
Install the necessary project dependencies with:
$ composer install

### Configure the .env File
Configure the environment variables, such as:
- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `APP_KEY`, among others.

### Generate the Application Key
Generate the application key using:
$ php artisan key:generate

### Configure the Database
Create the database as defined in the .env file.
Execute migrations to create the necessary tables with:
$ php artisan migrate

### Run the Development Server
Start the development server with:
$ php artisan serve

Access the system at `http://localhost:8000`.

## 5. Project Structure

### Important Directories
- `app/`: Contains the controllers, models, and other core Laravel classes.
- `config/`: Configuration files of the application.
- `database/migrations/`: Migration files for the database structure.
- `routes/`: Definition of the application's routes.
- `resources/views/`: PDF template.

### Main Files
- `app/Models/`: Contains the Eloquent models for interacting with the database.
- `app/Http/Controllers/`: Contains the controllers that process HTTP requests.
- `routes/api.php`: Defines the API routes.

## 6. Database Configuration

### Connection
In the `.env` file, define the database settings:
- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=nome_do_banco`
- `DB_USERNAME=root`
- `DB_PASSWORD=sua_senha`

### Migrations and Seeds
- **Migrations**: Use `php artisan migrate` to create the tables.

## 7. API Routes and Endpoints

### Public Routes
- **POST** `/api/register`: User registration.
  - **Parameters**: `name`, `email`, `password`, `password_confirmation`.
- **POST** `/api/login`: User authentication.
  - **Parameters**: `email`, `password`.

### Protected Routes
- **POST** `/api/logout`: User logout.
- **POST** `/api/holidays`: Create a new holiday plan.
- **GET** `/api/holidays`: Retrieve all holiday plans.
- **GET** `/api/holidays/{id}`: Retrieve a specific holiday plan.
- **PUT** `/api/holidays/{id}`: Update a holiday plan.
- **DELETE** `/api/holidays/{id}`: Delete a holiday plan.
- **PDF** `/api/holidays/{id}/pdf`: Download the PDF of a specific holiday plan.

## 8. Authentication

### Laravel Passport
The system uses Laravel Passport for OAuth2 authentication. Follow the steps below to install and configure Passport:

1. Install Passport:
$ composer require laravel/passport

2. Run the Migrations:
$ php artisan migrate

3. Install Passport:
$ php artisan passport:install

4. Configure Passport in the AuthServiceProvider:
   - Add `Passport::routes();` to the `boot()` method in `app/Providers/AuthServiceProvider.php`.

### Route Protection
Routes that require authentication use the `auth:api` middleware.

## 9. Error Management

### Error Handling
- Errors are captured and handled in the `app/Exceptions/Handler.php` file.
- Error responses are standardized in JSON format.

### Common Error Messages
- **401 Unauthorized**: When authentication fails.
- **404 Not Found**: When a route or resource is not found.

## 10. Tests

### Unit Tests
- Unit tests are located in the `tests/Unit` directory.
- To run the tests, use the corresponding Laravel command.

### Integration Tests
- Integration tests are located in the `tests/Feature` directory.
- They cover end-to-end scenarios, such as authentication and CRUD operations.

## 11. Deployment

### Deployment Prerequisites
- Ensure that all dependencies are installed.
- Run the migrations.
- Properly configure the `.env` file in production.

### Hosting Services
- DigitalOcean

### Dependency Updates
- Use the appropriate command to keep dependencies up to date.

## 12. Attachments and Resources
- **Laravel Documentation**: [Laravel Docs](https://laravel.com/docs)
- **Passport Documentation**: [Passport Docs](https://laravel.com/docs/9.x/passport)
- **Code Style Guide**: Use [PSR-12](https://www.php-fig.org/psr/psr-12/) to standardize the code style.
