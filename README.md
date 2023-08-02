## Installation

1. Unzip the downloaded archive
2. In your terminal run `composer install`
3. Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
4. In your terminal run `php artisan key:generate`
5. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
6. Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).
