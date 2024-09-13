# Usa a imagem base do PHP 8.3 com Apache
FROM php:8.3-apache

# Instala extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia o código fonte da aplicação para o diretório padrão do Apache
COPY src/ /var/www/html/

# Define permissões apropriadas
RUN chown -R www-data:www-data /var/www/html
