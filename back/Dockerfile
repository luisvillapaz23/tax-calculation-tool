FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    git \
    unzip
RUN docker-php-ext-install intl pdo pdo_mysql opcache zip \
    && a2enmod rewrite headers 
RUN sed -ri -e 's/^([ \t]*)(<\/VirtualHost>)/\1\tHeader set Access-Control-Allow-Origin "*"\n\1\2/g' /etc/apache2/sites-available/*.conf

WORKDIR /var/www/html
COPY . .

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/

EXPOSE 80
