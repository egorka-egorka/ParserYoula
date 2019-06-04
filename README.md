# Парсер от Барсика

![alt text](https://uglybadger.com/wp-content/uploads/2017/11/UglyBadger-favicon.png)

## Описание
Парсит объявления с Юлы

## Установка
С помощью Composer:

```
composer create-project egorka-egorka/donecparseryoula -s dev
```

После этого проверьте конфигурации для подключения к БД:

В файле bd.php в строке 
```php
R::setup('mysql:host=host_db;dbname=db_name', 'login', 'password');
```
Необходимо указать подлинные данные для подключения к БД на вашем локальном устройстве, где:
* host_db - адрес БД;
* db_name - название БД (если ранее не была создана, то создайте пустую БД);
* login - логин для доступа к БД
* password - пароль для доступа к БД
