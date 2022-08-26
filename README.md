

## About Project

Telephone Agenda Project, web application developed with the Laravel framework with PHP 8 and MySQL database
for the purpose of recording contacts in the cloud.

### Project Configuration

1. Create a new Schema in the Database Management System
ex: project_telephone_book

2. Configure the .env file

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_telephone_book
DB_USERNAME=root
DB_PASSWORD=secret
```
3. Install the project's dependencies with the command in the terminal

```composer
composer install
```
4. Configure the Database with the command in the terminal

```laravel
php artisan migrate
```

5. Initializing the project with the command in the terminal

```laravel
 php artisan serve
```
## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Luiz Santos via [luizcsdev@gmail.com](mailto:luizcsdev@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
