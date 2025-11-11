# Imagen oficial de PHP 8.2 con Apache
FROM php:8.2-apache

# Instalamos extensiones necesarias para MySQL (mysqli y PDO)
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli pdo_mysql

# (Opcional) Activamos mod_rewrite si llegas a usar URLs bonitas
RUN a2enmod rewrite

# Carpeta de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copiamos TODO el código del proyecto dentro del contenedor
COPY . /var/www/html

# Exponemos el puerto 80 (Apache)
EXPOSE 80

# Comando por defecto para lanzar Apache
CMD ["apache2-foreground"]
