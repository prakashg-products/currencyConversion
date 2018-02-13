## Currency Conversion

### Requirement
    
    php >=7.1
    mysql
    composer
    npm
   
### How To

1. Clone the repository
2. in the project directory, run  `composer install`
3. run `npm install`.
4. copy `.env.example` to `.env` in the project root folder.
5. make the necessary changes in `.env` file
6. Important: `php artisan migrate --seed`
7. run the project `php artisan serve`