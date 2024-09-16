#FROM php:7.4-fpm
FROM php:7.4.9-apache

# Copie seus arquivos PHP para o diretório do servidor web
COPY ./meu-site /var/www/html

# Instalação das extensões necessárias (por exemplo, pdo_mysql)
RUN docker-php-ext-install pdo pdo_mysql

# Atualize os pacotes e instale o Nano
RUN apt-get update && apt-get install -y nano

# Descomente a linha extension=php_pdo
RUN sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/' /usr/local/etc/php/php.ini-production

# Exponha a porta 80 (a mesma que você mapeou no docker-compose.yml)
EXPOSE 80
