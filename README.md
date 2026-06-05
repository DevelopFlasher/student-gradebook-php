# Электронный журнал на PHP

Небольшое web-приложение электронного журнала, развернутое через Docker Compose. В проекте разделены PHP backend на Apache, MySQL с initialization script и статический frontend через nginx.

## Стек

- PHP
- MySQL
- Apache
- nginx
- Docker Compose
- HTML, CSS, JavaScript

## Возможности

- Авторизация demo-пользователя
- Отображение предметов, оценок и преподавателей
- API-файлы для пользователей, предметов, преподавателей и оценок
- Инициализация MySQL из SQL-скрипта
- Отдельный статический frontend

## Запуск

```bash
docker compose up --build
```

| Компонент | URL |
| --- | --- |
| Frontend | http://localhost:8010 |
| PHP API | http://localhost:8080 |
| MySQL | `localhost:3306` |

## Структура

```text
apache/  PHP API и Apache container
mysql/   SQL-инициализация базы
nginx/   статический frontend и nginx config
```

## Для портфолио

Проект демонстрирует простой multi-container web stack: PHP, MySQL, nginx и базовую работу с данными.

