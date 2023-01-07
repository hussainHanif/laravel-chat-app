# Laravel Chat App
Laravel 9 is out and we’re thrilled to announce our new Chat application built using it.
## Installation Steps
1. `composer install`
2. `cp env.example .env`
3. `php artisan key:generate`
4. `php artisan migrate`
5. `php artisan db:seed`
6.  Create Channel in https://dashboard.pusher.com/ and configure it with your laravel project by adding its configuration variable in .env file.
7.  Run your project `php artisan migrate`