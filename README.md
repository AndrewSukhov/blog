<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Тестовое задание для веб-разработчика

## Установка.

1. Для загрузки фреймворка и всех необходимых библиотек запустить в папке проекта команду:
```
composer install
```
2. Подключение к БД.
В конфиге blog\config\database.php
выставьте свои параметры для подлючения к БД
```
'port', 'database', 'username', 'password'
```
3. Примените миграции.
Для применения миграции выполните команду:
```
php artisan migrate
```

## Консольное приложение
Для добавления данных из JSON файлов в БД выполните консольные команды:
```
php artisan load:products products.json
```
```
php artisan load:categories categories.json
```
JSON файлы располагаются в директории blog\storage\app\

