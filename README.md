**Environment: Linux**

I used Docker as runtime environment.
To use the app you have to install docker desktop on your system.
When you open the project, run the following commands: 

./vendor/bin/sail up 

./vendor/bin/sail artisan migrate 

composer install


The first command starts the docker container and the second one runs the database.

The following commands are to interact with the app, you have to run these in the docker console:

//Get all employees
curl http://localhost:80/employees/

//Get single Employee
curl http://localhost:80/employees/{id}

//Delete single Employee
curl -X DELETE http://localhost:80/employees/{id}



Thoughts:
I would have get help from someone who knows api endpoints, that was my biggest problem with this task.
Furthermore I would have divided the database in different tables to make it more readable.
If I had more time I would have used something like the roadrunner framework for paralelization and to use more threads.