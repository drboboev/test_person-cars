##Usage

Download .zip archive, extract it and run:

````
$ cd foxstone-test-task
$ docker-compose up -d --build
````

Now, you need install all dependencies with composer. For that, go inside docker container:

````
$ docker-compose exec php-fpm bash
````

Inside docker container, run:

````
$ cd app
$ composer install
````

Now, you need make migrations with doctrine:
````
$ php bin/console make:migrations
$ php bin/console doctrine:migrations:migrate
````

And load test data to DB:

````
$ php bin/console doctrine:fixtures:load
````

And exit from the container:

```
$ exit
```

Then open ````http://127.0.0.1```` in your browser.

##Remove docker containers

...with command:
````
$ docker-compose down
````