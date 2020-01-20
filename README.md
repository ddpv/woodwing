## Woodwing

Approach to be taken:

1. install laravel framework, reason: favorite and trying to roll your own is a waste of time
2. Add a controller for the required rest page
3. Create simple add two values functionality
4. Add distance unit for input and output.
5. Process distance unit

After composer install run
php artisan dusk:install

To run:
php artisan serve
http://localhost:8000/api/distance/y/1/m/20/y

Things to improve the code
Add a repository for the methods that are currently in the controller
Use repository to add detailed unit tests
