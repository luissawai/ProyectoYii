FROM php:7.4-apache

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Activa mod_rewrite
RUN a2enmod rewrite

# Cambia DocumentRoot para Yii2
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/web|' /etc/apache2/sites-available/000-default.conf

# Crear directorio de trabajo
WORKDIR /var/www/html

# Copia composer.json y composer.lock primero
COPY composer.json composer.lock ./

# Instala dependencias con --prefer-dist
RUN composer install --prefer-dist --no-scripts --no-progress --no-interaction

# Copia el resto del código fuente
COPY . .

# Genera el autoloader y ejecuta scripts post-install
RUN composer dump-autoload --optimize && \
    composer run-script post-install-cmd --no-interaction

# Permisos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html