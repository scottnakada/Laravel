This project was from this tutorial:

	https://www.parthpatel.net/laravel-tutorial-for-beginner-5-4/

To run this project:
1) Clone it from git:

	git clone https://github.com/scottnakada/Laravel.git
	cd Laravel/todo

2) Create an empty sqlite database file:

	touch database/database.sqlite

3) Load the composer dependancies:

	composer install

4) Populate the database with empty database tables:

	php artisan migrate:fresh

5) Start the web server:

	php artisan serve

6) Go to the web-page in the browser at:

	localhost:8000

