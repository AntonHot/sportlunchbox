<p align="center" style="background-color: black;"><img src="http://84.201.189.102/img/logo.png" alt="Sport Lunch Box" width="200" style="background-color: black; padding: 20px;"></p>

## Technologies

- PHP, Laravel 
- Vue.js
- MySQL
- NGINX, PHP-FPM, Docker(for dev)
- Production: Yandex Cloud

## Deploy app

1. Склонировать проект
2. Скопировать файл с настройками и поменять их

    ```bash
    sudo cp /var/www/sportlunchbox/.env.example /var/www/sportlunchbox/.env
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
