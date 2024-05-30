# Use the official PHP image from the Docker Hub
FROM php:7.4-apache

# Copy the contents of the current directory to /var/www/html in the container
COPY . /var/www/html/

# Expose port 80 to the outside world
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]


