<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Online Support Platform

#### Laravel Setup (Laravel version 8 - PHP 7.4)

- install apache server PHP 7.4
- install composer
- clone laravel `Online Support Platform Project` to the apache sever environment (PHP 7.4)
- run `composer install`


#### Database setup (MySql) & mail server

Create DB Name 'support_platform_db'
Query: `CREATE DATABASE support_platform_db;`

create `.env` file using `.env.example` in laravel, update DB connection infomation

````
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=support_platform_db
DB_USERNAME=root
DB_PASSWORD=root
````
````
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=infotestmailer2022@gmail.com
MAIL_PASSWORD=testmailer@123
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=infotestmailer2022@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
````

- migrate table to DB
  COMMAND: `php artisan migrate:fresh`

- create admin login account default
  COMMAND: `php artisan db:seed --class=UserSeeder`

#### Run Laravel Application

COMMAND: `php artisan serve`
Server (http://127.0.0.1:8000) started message come

Base Path: http://127.0.0.1:8000/<route>

#### Seeder Generated Default Agent Login Info

````
Email: admin@support.lk
Password: admin@123
````

#### Screenshots 

![alt text](1.png)

![alt text](2.png)

![alt text](3.png)

![alt text](4.png)

![alt text](5.png)

![alt text](6.png)

![alt text](7.png)

![alt text](8.png)
