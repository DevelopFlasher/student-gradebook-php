# Student Gradebook PHP

A compact PHP and MySQL gradebook application packaged with Docker Compose. The project contains an Apache/PHP API, a MySQL initialization script, and an nginx-served static frontend.

## Tech Stack

- PHP
- MySQL
- Apache
- nginx
- Docker Compose
- HTML, CSS, JavaScript

## Features

- Dockerized PHP backend
- MySQL schema initialization
- Static frontend served through nginx
- API files for users, teachers, subjects, and marks

## Run Locally

```bash
docker compose up --build
```

Services:

| Service | URL |
| --- | --- |
| Frontend | http://localhost:8010 |
| PHP API | http://localhost:8080 |
| MySQL | `localhost:3306` |

## Repository Structure

```text
apache/       PHP API and Apache container
mysql/        Database initialization
nginx/        Static frontend and nginx config
```

## Portfolio Notes

This project demonstrates a simple multi-container web application with a PHP backend, MySQL database, and static frontend split behind nginx.

