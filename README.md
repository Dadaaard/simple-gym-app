<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Back End Implementations



- Custom Middleware
  Implemented Custom Middleware that verifies the role of user whether admin, member or instructor. then redirect it to the specific page based on its role.
- CRUD
  Basic implementation of CRUD with resource controller.
- Gates and Policies
  #Gates and #Policies are used for authorization. Used to check if the User has the permission to perform the certain action. 
- Seeder
  Used to generate multiple dummy data to test the capability of application
- Many to Many Relationship
  I implemented a many-to-many relationship to learn how to store data without using a model. Instead, I used the attach() method to store the data and the detach() method to delete it.
- Eager Loading
  Implemented relationships and with() method to my query to avoid the n+1 redundancy. And proved it working by using Laravel Telescope.
- Write Command
  Custom Artisan Command to increment the scheduled class Date by 1. use "php artisan app:increment-date"
- Events and Listeners

- Logs

