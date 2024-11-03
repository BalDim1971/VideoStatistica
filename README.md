# VideoStatistica
Программа для сбора статистики просмотра учебных видео

Основа взята со статьи:
https://thriveread.com/apache-php-with-docker-mysql-and-phpmyadmin/

# Подготовка запуска и запуск сервера

1. Должны быть установлены php с composer. 
2. Перейти в головной каталог проекта.
### При первом создании установить yii2 командой:
    composer create-project --prefer-dist yiisoft/yii2-app-basic basic
3. Проверить содержимое Dockerfile и docker-compose.yml.
4. На компьютере должен быть установлен docker-compose.

### Поднять докер-контейнер:
    docker-compose up -d
### Остановить докер-контейнер:
    docker-compose down
### Выполнить команду внутри контейнера:
    docker-compose run --rm php composer install
### Зайти внутрь контейнера:
    docker-compose exec webserver bash
### Запустить сервера
    cd basic
    php yii serve webserver:8080

## Работа с базой данных
