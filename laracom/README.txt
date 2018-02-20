This project is a copy of this github repo:

	https://github.com/jsdecena/laracom.git

To run this project:
1) Clone it from git:

	git clone https://github.com/scottnakada/Laravel.git
	cd Laravel/laracom

2) Create an empty mysql database, in my case, I created
    a docker database

    <<fill in instructions here>>

3) Modify the .env file to include the connection
    information for the mysql database, and an empty
    database inside the mysql database

4) Load the composer dependencies:

	composer install

5) Populate the database with tables, and seed the tables with dummy data:

	php artisan migrate --seed

6) Start the web server:

	php artisan serve

7) Go to the web-page in the browser at:

	localhost:8000