# Usa la imagen oficial de PHP con Apache
FROM php:8.0-apache

# Copia los archivos del proyecto al directorio raíz del servidor web
COPY . /var/www/html/

# Ajustar permisos de los archivos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Exponer el puerto 80 para el servidor web
EXPOSE 80
