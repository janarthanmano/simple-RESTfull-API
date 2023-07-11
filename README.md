<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## About Public Data API

This is a simple RESTful API built using Laravel to provide access to public database containing details of individual person.


### Project requirement 
- **php 8.0 and above**
- **MySQL 8 or above**

### Required tools and their links to install them before starting the API server

- **composer -> [Windows installer](https://getcomposer.org/Composer-Setup.exe)**
- **nvm for Node.js and npm [Windows installer](https://github.com/coreybutler/nvm-windows/releases/download/1.1.11/nvm-setup.exe)**
- **Postman app [Windows installer](https://dl.pstmn.io/download/latest/win64)**
- **Git [Windows installer](https://github.com/git-for-windows/git/releases/download/v2.41.0.windows.1/Git-2.41.0-64-bit.exe)**
- **Wamp server [Windows installer](https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.3.0_x64.exe/download)**

### How to start and get going

- **Install all the required tools to run the project from the information provided above.**
- **Clone this repo into a directory**
- **Open your terminal/cli, goto the project folder and run "composer install" and "npm install" to download all project dependencies**
- **Rename .env.example to .env and edit the file to make sure the mysql connection info is updated according to your database, change the DB_DATABASE, DB_USERNAME, and DB_PASSWORD**
- **Run PHP artisan commands to migrate database, seed database "php artisan migrate", "php artisan db:seed", "php artisan migrate:fresh"**
- **Create the virtual host in WAMP with domain name "public.data.api"**
- **Import the Postman collection data from PublicDataAPI.postman_collection.json to get all the endpoints**
- **To get the authorization token, visit the endpoint http://public.data.api/setup**

### End points

- **GET http://public.data.api/setup to get new users authorization token**
- **GET http://public.data.api/api/v1/people to display all the public data as json format**
- **POST http://public.data.api/api/v1/people to add single record along with json format of the new record**
- **GET http://public.data.api/api/v1/people?firstName[eq]=somename to fetch filtered data**
- **PUT http://public.data.api/api/v1/people/id to update a record along with json format of the record in the body**
- **PATCH http://public.data.api/api/v1/people/id to update only few details of a record along with partial json format of the record in the body**
- **POST http://public.data.api/api/v1/people/bulk to add bulk data to the public database along with array of json formatted records**

### Security Vulnerabilities

This project doesn't unit testing done and also user authentication and authorization is hardcoded for demo purpose.
