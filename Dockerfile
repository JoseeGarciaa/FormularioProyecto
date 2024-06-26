# Usa la imagen oficial de PHP con Apache
FROM php:8.0-apache

# Copia los archivos del proyecto al directorio raíz del servidor web
COPY . /var/www/html/

# Exponer el puerto 80 para el servidor web
EXPOSE 80
