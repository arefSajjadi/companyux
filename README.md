<h1 align="center">
    COMPANY UX
</h1>

<p align="center">
<a href="https://www.php.net"><img src="https://img.shields.io/badge/php-8.0.2-9cf" alt="Latest Stable Version"></a>
<a href="https://laravel.com"><img src="https://img.shields.io/badge/laravel-9.0-critical" alt="License"></a>
<a href="https://companyux.com"><img src="https://img.shields.io/badge/version-1.0.0-success" alt="License"></a>
</p>

<p align="center">
    A repository for collecting the experiences of a company's user
</p>

<hr>

## Cause of development

This project continues the path of the `jobguys` website that we all know and know was closed, the purpose of
developing this project is to be the voice of your experiences and opinions.
>So, that we can have a more ideal society for all

[more..](https://github.com/RaminNietzsche/jobguy/issues/6)

## Technologies
* php (laravel)
* mysql
* javascript (jquery)
* blade template


# Installation

* step 1) Clones the repository into a new directory.
  ```shell
    git clone https://github.com/arefSajjadi/companyux.git
  ```
* step 2) Go to clones directory.
  ```shell
    cd your_directory
  ```
* step 3) Update all dependency via  [Composer](http://getcomposer.org/).
  ```shell
    composer update
  ```
* step 4) Configure your .env file, `you can use the .env.example as a guide `
  ```shell
    cp .env.example .env
  ```
* step 5) Migrate all database structure into mysql via `artisan command`
  ```shell
   php artisan migrate
  ```
* step 6) Create some fake data
  via [laravel factories](https://laravel.com/docs/8.x/database-testing#factory-relationships)
  ```shell
   php artisan db:seed
  ```  
  Or for migrate and seeding.
  ```shell
   php artisan migrate:fresh --seed
  ```
* ### step 7) Now, Everything is ready to <b>serve</b> `:)`
  ```shell
   php artisan serve
  ```

## TDD

I am use laravel unit testing (TDD) on `test\feature` directory you can see it.
> Some tips for (TDD)
> * To run your tests, execute the `./vendor/bin/phpunit` or `php artisan test` command from your terminal
    >  * Laravel is built with testing in mind. In fact ! support for testing with PHPUnit is included out of the box
    and a
    `phpunit.xml` file is already set up for your application.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


  
