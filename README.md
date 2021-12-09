# laravel_voyager_youdo

### Installing steps
#### 1-step
```md
git clone https://github.com/teamprodev/laravel_voyager_youdo.git
cd laravel_voyager_youdo
composer install
cp .env.example .env
php artisan key:generate
```
#### 2-step
#### Next make sure to create a new database and add your database credentials to your .env file, you will also want to add your application URL in the APP_URL variable
```md
DB_HOST=192.168.100.100
DB_PORT=3306
DB_DATABASE=laravel_voyager_youdo
DB_USERNAME=root
DB_PASSWORD=root
```
#### 3-steps
```md
php artisan voyager:install
php artisan voyager:admin admin@admin.com --create
```
#### Next enter admin username and password `username`: admin, `password`: password
