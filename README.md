<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About App

Is simple artical system  have roles & permission in dashboard curd to articles
user can add comments 

- laravel 9
- php 8.1

##### Packages 
- spatie/laravel-permission
- livewire/livewire v 2.6
- rappasoft/laravel-livewire-tables v 2.15
- laravelcollective/html v 4.6


### How Install
- git cone https://github.com/enasellithy/blog_test.git
- cd blog_test
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan serv


## API Link
 - api/getArticles
 - api/getArticles/{id}
