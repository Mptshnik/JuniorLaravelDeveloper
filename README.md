<h1>Действия для запуска программы</h1>

1) Прописать команды composer update, composer install, composer dump-autoload
2) Создать .env файл в корне проекта и настроить переменные среды. Для очередей QUEUE_CONNECTION=database
3) Миграции - php artisan migrate
4) Сидеры - php artisan db:seed
5) Для рассылки email необходимо настроить mailer в env файле. Я использовал smtp
6) Команды php artisan queue:work - для запуска очередей, php artisan schedule:work - для запуска планировщика

