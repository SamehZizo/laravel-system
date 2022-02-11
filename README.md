# Laravel System

## Setup

#### 1. Add libary to composer.json
```sh
  "require": {
      "sameh/laravel-system": "*"
  }
  ```
```sh
"repositories": [
      {
          "type": "vcs",
          "url": "git@github.com:SamehZizo/laravel-system.git"
      }
  ]
  ```

#### 2. Run below command to update composer
```sh
composer update
  ```

#### 3. Run below command to publish files, then select (**laravel-system**) number
```sh
php artisan vendor:publish --force
  ```

#### 4. Add provider class in config -> app.php -> providers
```sh
Sameh\LaravelSystem\LaravelSystemServiceProvider::class,
  ```
  
#### 5. Run migration
```sh
php artisan migrate
  ```
  
#### 6. Run package seed
```sh
php artisan db:seed --class=Sameh\LaravelSystem\database\seeds\LaravelSystemDatabaseSeeder
  ```
  
  
## Settings

- #### Change menu file
  ###### Change "menu_layout" variable in config -> laravel_system
