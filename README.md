# Laravel CRUD

## CREATE A NEW PROJECT

`composer create-project --prefer-dist laravel/laravel:^7.0 repo-name cd repo-name`


--------------------------------------------------------------------

## UPDATING LARAVEL-MIX

root -> open package.json -> change "laravel-mix" in --> ^6.0.13

`npm install`

then

`npm audit fix`

then

`npx mix`

then

`npx mix watch`

--------------------------------------------------------------------

## INSTALLING BOOTSTRAP

`composer require laravel/ui:^2.4`

then

`php artisan ui bootstrap`

then

`npm install`

then

open .blade.php file and add

`<link rel="stylesheet" href="{{ asset('css/app.css')}}">`

--------------------------------------------------------------------

## CREATING A NEW EMPTY DATABASE

Open MAMP -> phpMyAdmin -> New

Open .env file (project root) and update DB values: 

`DB_CONNECTION=mysql `\
`DB_HOST=127.0.0.1 `\
`DB_PORT=3306`\
`DB_DATABASE=db_name` \<- same database name chose on SQL\
`DB_USERNAME=root`\
`DB_PASSWORD=root` <- add this value

## Testing connection with database
`php artisan tinker` 

then

`DB::Connection()->getPdo();`

--------------------------------------------------------------------
## DATABASE: MIGRATIONS Generate the migration for a new db table

`php artisan make:migration create_tablename_table`

-- https://laravel.com/docs/7.x/migrations#creating-tables --

check into root/database/migrations you should have a new file

`php artisan migrate:rollback` if you need to drop the table from the database to edit it

--------------------------------------------------------------------
## FILLING DATABASE THROUGH phpMyAdmin

Open your database in phpMyAdmin then select SQL and create a new (or more) query


--------------------------------------------------------------------
## MAKING A MODEL

`php artisan make:model Name` <- PascalCase

--------------------------------------------------------------------
## MAKING A CONTROLLER WITH --resource (CRUD)

`php artisan make:controller --resource NameController` <- PascalCase

--------------------------------------------------------------------
## CONNECTING DATABASE (database/migrations)

Open routes/web.php and add:

`Route::resource('/name', 'NameController');`




