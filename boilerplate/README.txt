This project was generated from the tutorial:

	https://github.com/rappasoft/laravel-5-boilerplate

To run this project:
1) Clone it from git:

	git clone https://github.com/scottnakada/Laravel.git
	cd Laravel/boilerplate

2) Create an empty sqlite database file:

	touch database/database.sqlite

3) Load the composer dependancies:

	composer install

4) Load npmdependencies

    npm install

5) Edit the .env file

    cp .env.example .env
    vi .env

    change DB_CONNECTION=mysql
    to     DB_CONNECTION=sqlite

6) Generate an APP_KEY for the .env file

    php artisan key:generate

7) Populate the database with empty database tables:

	php artisan migrate

8) Seed the database with test data

    php artisan db:seed

9) Build the styles and scripts

    npm run dev

10) Link the storage folder for avatar uploads

    php artisan storage:link

11) Start the web server:

	php artisan serve

12) Go to the web-page in the browser at:

	localhost:8000
	Default credentials are:
	    Username: admin@admin.com
	    Password: 1234
