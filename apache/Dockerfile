FROM php:8.1-apache
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ports.conf /etc/apache2/ports.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2enmod dbd && a2enmod authn_dbd && apt update && apt install -y apache2-utils libaprutil1-dbd-mysql netcat

EXPOSE 8080