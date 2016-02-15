## Laravel PHP Framework

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

## A Sample web-site which allows a user to create, read, update and delete user profiles.

**Those user profiles should consist of the following fields:**
* username
* e-mail-address (every user have unique email)
* phone number
* birth date

1. The Front end first list the user profiles in a table and offer a button for creating a new user profile.
2. From the table you can delete or choose a user profile
3. If you choose a user profile from the table or click the “create” button then you are led to a form where you can update or create the profile
4. use MariaDB or MySQL to store the data (for DB you have to set your .env file)
5. barebones PHP 5.5+, Laravel 5.0 and MySQL.
6. The front end is implemented with Twitter Bootstrap
7. It is necessary to authenticate before you reach the above described functionality(you have a button on top right for creating Admin)
8. The birth date chosen with jQuery Date Picker or You can enter it Manually.
9. Before user profile values are sent updated or created - they are checked. (e.g: “test-test” is not a valid email adress and “jerry123” is not a valid first name).