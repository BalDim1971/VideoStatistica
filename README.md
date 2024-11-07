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
После каждого создания таблицы применять миграцию:
    
    php yii migrate up

Таблица уникальных пользователей: имя, фамилия, е-мэйл, уникальный 
идентификатор. Возможно стоит добавить отчество, пол.

    php yii migrate/create create_users_table --fields="first_name:string(30):notNull,last_name:string(30):notNull,email:string(50):notNull,uuid:string(32):notNull"
    php yii migrate up

    php yii gii/model --tableName=users --modelClass=Users --ns="app\models"
    php yii gii/crud --modelClass=app\\models\\Users --controllerClass=app\\controllers\\UsersController 

Таблица для видео: наименование, длительность (сек), владелец (внешний ключ)

    php yii migrate/create create_VideoList_table --fields="name:string(50):notNull,length:integer:notNull,user_id:integer:notNull:foreignKey(users)"
    php yii migrate up

    php yii gii/model --tableName=VideoList --modelClass=VideoList --ns="app\models"
    php yii gii/crud --modelClass=app\\models\\VideoList --controllerClass=app\\controllers\\VideoListController 

Таблица стандартных(?) действий пользователя: вошел, вышел, включил звук, выключил звук, поставил отметку(лайк и т.д.)
наименование поля, действие

    php yii migrate/create create_actions_table --fields="name:string:notNull, action:string:notNull"
    php yii migrate up

    php yii gii/model --tableName=actions --modelClass=Actions --ns="app\models"
    php yii gii/crud --modelClass=app\\models\\Actions --controllerClass=app\\controllers\\ActionsController 

Таблица запускаемых видео с временем запуска: ссылка на видео, время старта, время финиша(?).
    
    php yii migrate/create create_VideoWork_table --fields="video_id:integer:notNull:foreignKey(VideoList),time_start:timestamp,time_stop:timestamp"
    php yii migrate up
    
    php yii gii/model --tableName=VideoWork --modelClass=VideoWork --ns="app\models"
    php yii gii/crud --modelClass=app\\models\\VideoWork --controllerClass=app\\controllers\\VideoWorkController 

Таблица статистики по каждому пользователю: ссылка на имя (ключ?), ссылка на видео, ссылка на действие, время
(относительно начала видео ?)
    
    php yii migrate/create create_statistica_table --fields="users_id:integer:notNull:foreignKey(users),video_id:integer:notNull:foreignKey(VideoWork),action_id:integer:notNull:foreignKey(actions),time:integer:notNull"
    php yii migrate up

    php yii gii/model --tableName=statistica --modelClass=Statistica --ns="app\models"
    php yii gii/crud --modelClass=app\\models\\Statistica --controllerClass=app\\controllers\\StatisticaController 

