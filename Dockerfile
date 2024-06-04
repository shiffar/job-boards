# Use the official PHP image from the Docker Hub
FROM php:7.4-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Define a build argument for the directory
ARG APP_DIR=/var/www/html

# Copy the contents of the specified directory to /var/www/html in the container
COPY . $APP_DIR/

# Expose port 80 to the outside world
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]

