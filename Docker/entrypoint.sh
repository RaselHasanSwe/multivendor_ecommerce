#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Createing env file for env $APP_ENV"
    cp .env.example .env
fi

role=${CONTAINER_ROLE:-app}
if [ "$role" = "app" ]; then
    php artisan migrate
    php artisan key:generate
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
    exec docker-php-entrypoint "$@"
elif [ "$role" = "queue" ]; then
    echo "Running the queue"
    php /var/www/artisan queue:work --tries=3 --timeout=180
elif [ "$role" = "websocket" ]; then
    echo "Running the websocket"
    php artisan websockets:serve
fi



