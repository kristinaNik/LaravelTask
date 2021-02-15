## Steps to run project

 - **create a host name in your hosts file:** laravel-task.local
 - **run** `docker-compose up --build --force-recreate -d`
 - **execute inside container php artisan command by running** - `docker exec -it laravel-task bash` 
    and then go to `cd app/`
 - get access to project using: http://laravel-task.local


## For DB
 -  **copy** .env.example to your .env
 - **run** `php artisan db:create laravel`
 - **run** `php artisan migrate` 
 
## For Mail config
 - in **env** add credentials from mailtrap.io 
  `MAIL_USERNAME=
   MAIL_PASSWORD=`
   
## RabbitMQ
 - **run** `php artisan queue:work`
 - Go to http://localhost:15672/ to access the RabbitMQ management platform and observe rendering of the messages