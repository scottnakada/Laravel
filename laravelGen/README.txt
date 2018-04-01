Generate a project using InfyOm Laravel Generator

The purpose of this template is to show how to create
a quick boilerplate template using InfyOm Laravel Generator
Follow the instructions below to see how this template was
generated.

1) laravel new laravelGen
2) cd laravelGen
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
            "doctrine/dbal": "~2.3",
            "infyomlabs/core-templates": "5.3.x-dev"
        },

6) Install the new composer files

    composer update

7) Edit config/app.php.

    Add lines to the providers section:

        Collective\Html\HtmlServiceProvider::class,
        Laracasts\Flash\FlashServiceProvider::class,
        Prettus\Repository\Providers\RepositoryServiceProvider::class,
        \InfyOm\Generator\InfyOmGeneratorServiceProvider::class,
        InfyOm\CoreTemplates\CoreTemplatesServiceProvider::class,

    Add lines to the ‘aliases’ section:

        'Form'      => Collective\Html\FormFacade::class,
        'Html'      => Collective\Html\HtmlFacade::class,
        'Flash'     => Laracasts\Flash\Flash::class,

8) Publish the new providers to the vendors directory

    php artisan vendor:publish

9) Edit config/infyom/laravel_generator.php

    Set: 'templates' => 'core-templates’
    Set: 'softDelete' => false,
    Set: In the ‘timestamps’ section:
	    'enabled'       => false,

10) Install the new Infyom options:

    php artisan infyom:publish

11) Generate the new layouts

    php artisan infyom.publish:layout

12) Create the database tables

    php artisan migrate:refresh

13) Test it using valet

    http://laravelgen.test