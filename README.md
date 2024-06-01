Старт: php artisan serve 

Ошибка: Your Composer dependencies require a PHP version ">= 8.2.0". You are running 8.1.9.
1) Удалить vendor
2) composer install --ignore-platform-reqs
