# Student Records API

Laravel REST API for MIT 202 Laboratory Activity No. 01. The API supports student record creation and listing with the same application code against local MySQL or Supabase PostgreSQL.

## Stack

- PHP 8.2+
- Laravel 11
- Eloquent ORM
- MySQL or Supabase PostgreSQL
- PHPUnit and Postman

## Setup

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

The API runs at `http://127.0.0.1:8000`.

## Endpoints

| Method | URL | Result |
| --- | --- | --- |
| GET | `/api/students` | Returns all students with HTTP 200 |
| POST | `/api/students` | Validates and creates a student with HTTP 201 |

POST JSON body:

```json
{
  "student_number": "2026-9999",
  "first_name": "Demo",
  "last_name": "Student",
  "email": "demo.student.9999@example.com",
  "course": "BSIT"
}
```

## Database switch

Change only the database values in `.env`. Keep routes, controller, model, migrations, and Postman requests unchanged.

Local MySQL example:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_records
DB_USERNAME=root
DB_PASSWORD=
```

Supabase example:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=aws-0-ap-southeast-2.pooler.supabase.com
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres.<PROJECT_REF>
DB_PASSWORD="<SUPABASE_PASSWORD>"
```

After editing `.env`, clear cached settings:

```bash
php artisan config:clear
```

Do not commit `.env` or any real password.

## Tests

```bash
vendor/bin/phpunit
```

The test suite covers GET, POST, validation, and database persistence.

## Documentation

The `docs/` folder contains the laboratory report, presentation, architecture diagram, cheat sheet, and screenshot evidence.
