## Steps to run project

 - **create a host name in your hosts file:** laravel-task.local
 - **run** `docker-compose up --build --force-recreate -d`
 - **execute inside container php artisan command by running** - `docker exec -it laravel-task bash` 
    and then go to `cd app/`
 - get access to project using: http://laravel-task.local
 
## RabbitMQ
 - Go to http://localhost:15672/ to access the RabbitMQ management platform and observe rendering of the messages