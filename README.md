# Laravel Patient Registration API

![Laravel Version](https://img.shields.io/badge/Laravel-8.x-red)
![PHP Version](https://img.shields.io/badge/PHP-^7.4-blue)

This is a Laravel API for patient registration, which allows users to register patients with their name, email address, phone number, and document photo. The application provides validation for user-entered data, stores patient information in a MySQL database, and sends a confirmation email asynchronously upon successful registration.

## Features

-   User-friendly API for patient registration
-   Validation for required fields and appropriate data types
-   Storage of patient data in a MySQL database
-   Asynchronous email confirmation to avoid blocking the application
-   Secure and efficient handling of patient documents

## Requirements

-   PHP ^7.3
-   Laravel ^8.75
-   MySQL Database
-   Composer (for package installation)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/dabdevs/patient-registration-api.git
```


2. Move inside project folder:

```bash
cd patient-registration-api
```


3. Install composer dependencies:

```bash
composer install
```


4. Set up the environment:

Copy the `.env.example` file to `.env` 

```bash
cp .env.example .env
```

5. Open .env file and update the necessary configurations, including database connection and mail settings.


```bash
DB_DATABASE=patient_management
APP_PORT=8000 # 8000 is an example. Feel free to set any available port on your machine
```


6. Install Laravel Sail:

```bash
composer require laravel/sail --dev
```


7. Publish Sail's docker-compose.yml file to the root of the project (choose mysql option):

```bash
php artisan sail:install
```


8. Build project containers with the following command:

```bash
./vendor/bin/sail up -d
```


9. Register the project path in Docker Desktop
   Preferences > Resources > File sharing > Add project path > Apply and restart


10. Bash inside the container to perform artisan commands:

```bash
./vendor/bin/sail bash
```


11. Generate the application key:

```bash
php artisan key:generate
```


12. Create the tables for performing queue jobs:

```bash
php artisan queue:table
```


13. Run this command to listen to incoming queues:

```bash
php artisan queue:work
```


14. Run the database migrations and the seeders:

```bash
php artisan migrate --seed
```


15. Create a symbolic link between public and storage directories:

```bash
php artisan storage:link
```

16. Publish JWT provider and create secret string:

```bash
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
```


## API Endpoints
This API provides user registration functionality using JSON Web Tokens (JWT) for authentication. Users can register and obtain a JWT token to authenticate themselves for future API requests.

### User Registration

-   **Endpoint**: `/api/v1/auth/register`
-   **Method**: POST
-   **Parameters**:
    -   `name` (string): User's name (required)
    -   `email` (string): User's email address (required, valid email format)
    -   `password` (string): User's password(required)

### User Login

-   **Endpoint**: `/api/v1/auth/login`
-   **Method**: POST
-   **Parameters**:
    -   `email` (string): User's email address (required, valid email format)
    -   `password` (string): User's password(required)

### User Logout

-   **Endpoint**: `/api/v1/auth/logout`
-   **Method**: POST

### Patient Registration

-   **Endpoint**: `/api/v1/register`
-   **Method**: POST
-   **Parameters**:
    -   `name` (string): Patient's name (required)
    -   `email` (string): Patient's email address (required, valid email format)
    -   `phone_number` (string): Patient's phone number (required)
    -   `document_photo` (file): Patient's document photo (required, image or PDF format)

### Get Patient by ID

-   **Endpoint**: `/api/v1/patients/{id}`
-   **Method**: GET
-   **Parameters**:
    -   `id` (integer): Patient ID (required)

## How to Use

1. Register a user to receive a token using the `/api/v1/auth/register` endpoint by providing the required parameters in the request body. 

2. Register a new patient using the `/api/v1/register` endpoint by providing the required parameters in the request body.

3. Upon successful registration, the patient's data will be stored in the database, and a confirmation email will be sent asynchronously to the provided email address.

4. To retrieve patient information, use the `/api/v1/patients/{id}` endpoint, replacing `{id}` with the patient's ID.

## Contributing

Contributions are welcome! If you find any issues or want to enhance the application, feel free to open a pull request.

## License

This Laravel Patient Registration API is open-source software licensed under the [MIT License](LICENSE).

## Author

Alain Jean - [GitHub](https://github.com/dabdevs)

## Acknowledgments

-   Thanks to the Laravel community for providing an amazing framework.
