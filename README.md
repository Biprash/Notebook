# Notebook

Notebook is a website where you can read/write notes, books, and much more from the same place.

# Notebook Frontend

The offical Notebook Frontend is done using React Typescript. You can download the frontend [here](https://github.com/Biprash/Notebook-Frontend) or clone using

```sh
	$ git clone https://github.com/Biprash/Notebook-Frontend.git
```

# Notebook Backend Installation

-   Clone the repository from [github](https://github.com/Biprash/Notebook).

```sh
	$ git clone https://github.com/Biprash/Notebook.git
```

-   Create an .env file in the root directory of the application
-   Copy the .env.example file content and paste in .env file.
-   Create a new database
-   Set the following paramters in the .env file. Change the contents in the square bracket

```
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=[name-of-database]
	DB_USERNAME=[database-user]
	DB_PASSWORD=[database password]
```

-   Install application dependencies using the following command on application root directory

```sh
	$ composer install
```

-   Once all the dependencies are installed. Generate the encryption keys of the application using the following command.

```sh
	$ php artisan key:generate
```

-   Migrate the database and seed with login credentials for the admin

```sh
	$ php artisan migrate --seed
```

-   Genetate the storage link for public url of images and files

```sh
	$ php artisan storage:link
```

-   Save the file and exit.

-   If there were no any errors during the above process, run the following command in the root directory of the application.

```sh
	$ sudo php artisan serve --port=80
```

-   Your Backend is running on localhost port 80.

## Login credentials for default user

```
    email: admin@demo.test
    password: password
```
