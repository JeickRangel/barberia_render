# Imagen oficial de PHP 8.2 con Apache (ya trae servidor web)
FROM php:8.2-apache

# Instalamos extensiones necesarias para MySQL con PDO
RUN docker-php-ext-install pdo pdo_mysql

# (Opcional) Activamos mod_rewrite si llegas a usar URLs bonitas
RUN a2enmod rewrite

# Carpeta de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copiamos TODO el código del proyecto dentro del contenedor
COPY . /var/www/html

# Exponemos el puerto 80 (Apache)
EXPOSE 80

# Comando por defecto (ya viene configurado para lanzar Apache en foreground)
CMD ["apache2-foreground"]
