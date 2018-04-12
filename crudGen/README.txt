Generate a project using InfyOm Laravel Generator

The purpose of this template is to show how to create
a quick boilerplate template using InfyOm Laravel Generator
Follow the instructions below to see how this template was
generated.

1) laravel new crudGen
2) cd crudGen
3) Edit .env (changes the db to use an sqlite database)

    Change from:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=homestead
        DB_USERNAME=homestead
        DB_PASSWORD=secret

    to:

        DB_CONNECTION=sqlite

4) Create an empty sqlite database

    touch database/database.sqlite

5) Edit composer.json

    Change from:

        "require": {
            "php": "^7.1.3",
            "fideloper/proxy": "^4.0",
            "laravel/framework": "5.6.*",
            "laravel/tinker": "^1.0"
        },

    to:

        "require": {
            "php": "^7.1.3",
            "fideloper/proxy": "^4.0",
            "laravel/framework": "5.6.*",
            "laravel/tinker": "^1.0",
            "infyomlabs/laravel-generator": "5.6.x-dev",
            "laravelcollective/html": "^5.6.0",
            "infyomlabs/adminlte-templates": "5.6.x-dev",
            "infyomlabs/swagger-generator": "dev-master",
            "jlapp/swaggervel": "dev-master",
            "doctrine/dbal": "~2.3",
            "yajra/laravel-datatables-oracle":"~8.0",
            "yajra/laravel-datatables-buttons":"^3.0"
        },

6) Install the new composer files

    composer update

7) Edit config/app.php.

    Add lines to the providers section:

        /*
         * InfyOm Service Providers...
         */
        Collective\Html\HtmlServiceProvider::class,
        Laracasts\Flash\FlashServiceProvider::class,
        Prettus\Repository\Providers\RepositoryServiceProvider::class,
        \InfyOm\Generator\InfyOmGeneratorServiceProvider::class,
        \InfyOm\AdminLTETemplates\AdminLTETemplatesServiceProvider::class,

        /*
         * Datatables Service Providers...
         */
        Yajra\DataTables\DataTablesServiceProvider::class,


    Add lines to the ‘aliases’ section:

        'Form'      => Collective\Html\FormFacade::class,
        'Html'      => Collective\Html\HtmlFacade::class,
        'Flash'     => Laracasts\Flash\Flash::class,

        'DataTables' => Yajra\DataTables\Facades\DataTables::class,

8) Publish the new providers to the vendors directory

    php artisan vendor:publish

9) Edit config/infyom/laravel_generator.php

    Set: 'templates' => 'adminlte-templates’
    Set: 'softDelete' => false,
    Set: 'tables_searchable_default' => true,
    Set: In the 'add_on' section:
        'swagger' => true,
        'datatables' =>true,
    Set: In the ‘timestamps’ section:
	    'enabled'       => false,

10) Install the new Infyom options:

    php artisan infyom:publish

11) Generate the new layouts

    php artisan infyom.publish:layout

12) Create the database tables

    php artisan migrate:refresh

13) Test it using valet

    http://crudGen.test

14) Fix the issue with the broken menu button
    In resources/views/layouts/app.blade.php:
    Change From: <body class="skin-blue sidebar-mini">
    To:          <body class="skin-blue hold-transition">

    Change From: <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    To:          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

15) Create a Tasks Table with Interface

    php artisan infyom:api_scaffold Tasks --primary=task_id --tableName=tasks

    Specify fields for the model (skip id & timestamp fields, we will add it automatically)
    Read docs carefully to specify field inputs)
    Enter "exit" to finish

     Field: (name db_type html_type options) []:
     > task string text

     Enter validations:  []:
     > required

     Field: (name db_type html_type options) []:
     > priority integer number

     Enter validations:  []:
     >

     Field: (name db_type html_type options) []:
     > due date date

     Enter validations:  []:
     >

     Field: (name db_type html_type options) []:
     > exit

16) Register a user, and login.  There should be a tasks menu
    item on the left menu bar.  Click it.  You should see a CRUD
    interface for a tasks table.


