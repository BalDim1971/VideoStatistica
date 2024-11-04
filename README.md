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
Таблица уникальных пользователей: имя, фамилия, е-мэйл, уникальный 
идентификатор. Возможно стоит добавить отчество, пол.

    php yii migrate/create create_users_table --fields="first_name:string(30):notNull,last_name:string(30):notNull,email:string(50):notNull,uuid:string(32):notNull"

Таблица для видео: наименование, длительность (сек), владелец (внешний ключ)

    php yii migrate/create create_videolist_table --fields="
    name:string(50):notNull,length:integer:notNull,
    addForeignKey ($name, $table, $columns, $refTable, $refColumns, $delete = null, $update = null"

Таблица стандартных(?) действий пользователя: вошел, вышел, включил звук, выключил звук, поставил отметку(лайк и т.д.)
наименование поля, действие

    php yii migrate/create create_actions_table --field=name:string:notNull,action:string:notNull

Таблица статистики по каждому пользователю: ссылка на имя (ключ?), ссылка на видео, ссылка на действие, время
(относительно начала видео ?)
Посмотреть понятия foreignKey, чтобы сделать указатель на внешнюю таблицу

## Формируем модели и контроллеры

    php yii gii/model --tableName=users --modelClass=Users --ns="app\models"
    
    php yii gii/controller --actions=index.list --controllerClass=app\\controllers\\User

    php yii gii/model --tableName=videolist --modelClass=VideoList --ns="app\models"
