# Project Title

todo task management app in laravel

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for testing purposes.

### Prerequisites

Local server (ampps,xampp e.t.c) with
 PHP >= 7.1.3

### Installing
```
git clone https://github.com/avishekavi143/todo-app.git
```
Switch to the repo folder
```
cd todo-app
```
Install all the dependencies using composer
```
composer install
```
Copy the example.env file and make the required configuration changes in the .env file
```
cp .env.example .env
```
Generate a new application key
```
php artisan key:generate
```
Run the database migrations (Set the database connection in .env before migrating)
```
php artisan migrate
```
Start the local development server
```
php artisan serve
```
You can now access the server at http://localhost:8000

## Running the tests

Add 6 to 7 todo task
Now You can Edit, View detail, Mark as complete, delete task. You can also see the task which are completed and Mark as Pending and delete the todo tasks.

## Built With

* [Laravel 5.8] - The PHP framework
* [HTML 5]
* [Javascript]

## Authors

* **Abhishek Adhikari** - 
