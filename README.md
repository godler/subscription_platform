# Subscription platform

To be able to run this example execute the code below to build docker

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```


After docker has been built run commands below

```
    cp .env.example .env
    
    sail up
    
    sail composer install 
    
    sail artisan migrate
    
    sail artisan db:seed
    
```

Open app at http://localhost

MailHog http://localhost:8025/


Command for sending emails

```
sail artisan subscription:send

```


In project root is Postman collection SubscriptionApp.postman_collection.json

