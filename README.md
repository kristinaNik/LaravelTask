## Steps to run project

 - **create a host name in your hosts file:** laravel-task.local
 - **run** `docker-compose up --build --force-recreate -d`
 - **execute inside container php artisan command by running** - `docker exec -it laravel-task bash` 
    and then go to `cd app/`