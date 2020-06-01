<p align="center"><img src="http://84.201.189.102/img/logo.png" alt="Sport Lunch Box" width="200"></p>

## Stack

<img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="100" alt="Laravel">

- Laravel 
- Bootstrap 4, SCSS
- NGINX, PHP-FPM, MySQL
- Git
- Docker (dev)
- Yandex Cloud (prod)

## Deploy app

1. Склонировать проект
2. Скопировать файл с настройками и поменять их

    ```bash
    sudo cp /var/www/**projectname**/.env.example /var/www/**projectname**/.env
    ```

3. Установить зависимости PHP (composer должен быть установлен на машину)

    ```bash
    composer install -o
    ```

4. Установить зависимости Webpack (node должен быть установлен на машину)

    ```bash
    npm install
    npm run dev
    ```

5. Сгенерировать код приложения

    ```bash
    php artisan key:generate
    ```

6. Запустить докер контейнер (Docker должен быть установлен на машину)

    ```bash
    docker-compose up --build -d
    ```