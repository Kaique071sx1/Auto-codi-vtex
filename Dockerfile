FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev pkg-config libssl-dev libonig-dev libxml2-dev unzip \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install curl mbstring bcmath dom xml

RUN echo "expose_php = Off" > /usr/local/etc/php/conf.d/security.ini

RUN a2enmod rewrite headers

WORKDIR /var/www/html
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN echo "ServerTokens Prod" >> /etc/apache2/apache2.conf
RUN echo "ServerSignature Off" >> /etc/apache2/apache2.conf

CMD sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf && apache2-foreground
