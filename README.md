# Laravel Patient Registration API

![Laravel Version](https://img.shields.io/badge/Laravel-8.x-red)
![PHP Version](https://img.shields.io/badge/PHP-^7.4-blue)

This is a Laravel API for patient registration, which allows users to register patients with their name, email address, phone number, and document photo. The application provides validation for user-entered data, stores patient information in a MySQL database, and sends a confirmation email asynchronously upon successful registration.

## Features

- User-friendly API for patient registration
- Validation for required fields and appropriate data types
- Storage of patient data in a MySQL database
- Asynchronous email confirmation to avoid blocking the application
- Secure and efficient handling of patient documents

## Requirements

- PHP ^7.3
- Laravel ^8.75
- MySQL Database
- Composer (for package installation)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/dabdevs/patient-registration-api.git
```

2. Move inside project folder:

```bash
cd patient-registration-api
```

3. Start the Docker containers:

```bash
./vendor/bin/sail up -d
```

4. Bash inside the container:

```bash
./vendor/bin/sail bash
```

5. Install composer dependencies:

```bash
composer install
```

6. Set up the environment:

Copy the `.env.example` file to `.env` and update the necessary configurations, including database connection and mail settings.

```bash
cp .env.example .env
```

7. Generate the application key:

```bash
php artisan key:generate
```

8. Create the tables for performing queue jobs:

```bash
php artisan queue:table
```

9. Run database migrations and seeders:

```bash
php artisan migrate --seed
```

10. Create storage symbolic link:

```bash
php artisan storage:link
```

11. Create background process to watch and perform incoming jobs:

```bash
php artisan queue:work
```

12. Application should be running on localhost:8000

## API Endpoints

### Patient Registration

- **Endpoint**: `/api/register`
- **Method**: POST
- **Parameters**:
  - `name` (string): Patient's name (required)
  - `email` (string): Patient's email address (required, valid email format)
  - `phone_number` (string): Patient's phone number (required)
  - `document_photo` (file): Patient's document photo (required, image or PDF format)

### Get Patient by ID

- **Endpoint**: `/api/patients/{id}`
- **Method**: GET
- **Parameters**:
  - `id` (integer): Patient ID (required)

## How to Use

1. Register a new patient using the `/api/register` endpoint by providing the required parameters in the request body.

2. Upon successful registration, the patient's data will be stored in the database, and a confirmation email will be sent asynchronously to the provided email address.

3. To retrieve patient information, use the `/api/patients/{id}` endpoint, replacing `{id}` with the patient's ID.

## Contributing

Contributions are welcome! If you find any issues or want to enhance the application, feel free to open a pull request.

## License

This Laravel Patient Registration API is open-source software licensed under the [MIT License](LICENSE).

## Author

Alain Jean - [GitHub](https://github.com/dabdevs)

## Acknowledgments

- Thanks to the Laravel community for providing an amazing framework.