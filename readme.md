## A Sample web-site which allows a user to create, read, update and delete user profiles.

**Those user profiles consist of the following fields:**
* UserName
* E-mail-address (every user have unique email)
* Phone Number
* Birth Date

**Workflow:**

1. The Front end first list the user profiles in a table and offer a button for creating a new user profile.
2. From the table you can delete or choose a user profile
3. If you choose a user profile from the table or click the “create” button then you are led to a form where you can update or create the profile
4. use MariaDB or MySQL to store the data (for DB you have to set your .env file)
5. barebones PHP 5.5+, Laravel 5.0 and MySQL.
6. The front end is implemented with Twitter Bootstrap
7. It is necessary to authenticate before you reach the above described functionality(you have a button on top right for creating Admin)
8. The birth date chosen with jQuery Date Picker or You can enter it Manually.
9. Before user profile values are sent updated or created - they are checked. (e.g: “test-test” is not a valid email adress and “jerry123” is not a valid first name).


## Installation:

DB is injected as migrations, after setting up the project:
edit DB connection lines in .env file in the project folder:


```bash
DB_HOST=localhost
DB_DATABASE=your DB name
DB_USERNAME=root
DB_PASSWORD=your DB password
```

And then just run:
```bash
php artisan migrate
```

## Usefull links:
[Laravel 5.0 Documentation](https://laravel.com/docs/5.0/installation)

[Eloquent ORM](https://laravel.com/docs/5.0/eloquent)

[Validation Rules](https://laravel.com/docs/5.0/validation)

[Form Validation JavaScript](http://www.formvalidator.net/)

[Jquery Datepicker](https://jqueryui.com/datepicker/)

## Developer:
[Linkedin](https://www.linkedin.com/in/jnawaz)

[Xing](https://www.xing.com/profile/Jawad_Nawaz3)