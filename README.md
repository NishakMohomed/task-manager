<h1 align="center">
  Task Manager
</h1>

<h4 align="center">A simple day to day Task Manager web app built on top of <a href="https://laravel.com/" target="_blank">Laravel 8</a>.</h4>

<p align="center">
  <a href="#key-features">Key Features</a> •
  <a href="#how-to-use">How To Use</a>
</p>

![task-manager](https://github.com/NishakMohomed/task-manager/assets/93212087/39d70250-62c2-474e-b4c8-6f90b8fe37dc)

## Key Features

* User authentication
    - Users can create an account and manage their own task lists
* Task management
    - Users can create, view, update, delete their tasks
* Task categories
    - Users can categorize tasks
* Status management
    - Users can update status of their tasks
* Task filtering
    - Users can filter their tasks based on categories 

## How To Use

To clone and run this application, you'll need [Git](https://git-scm.com), [PHP - 7.3](https://www.php.net/downloads.php), [Composer](https://getcomposer.org/), [Node.js](https://nodejs.org/en) (which comes with [npm](http://npmjs.com)) and (a database server, in this app i have used [PostgreSQL](https://www.postgresql.org/download/)) installed on your computer. From your command line:

```bash
# Clone this repository
$ git clone https://github.com/NishakMohomed/task-manager.git

# Go into the repository
$ cd task-manager

# Install dependencies
$ composer install

# Install npm dependencies
$ npm install

# Compile the frontend
$ npm run dev

# Open the repository in vs code
$ code .
```
After opening the repository in the vs code create a .env file using the .env.example file. Then add the database connection details to the .env file and the 'database.php' config file. After that in your command line:

```bash
# Migrate the tables
$ php artisan migrate

# Run the app
$ php artisan serve
```
