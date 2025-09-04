
FROM php:8.0-apache
# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy project files into the container
COPY . /var/www/html/

