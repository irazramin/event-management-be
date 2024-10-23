# Use the official PHP 8.1 FPM image
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    unzip \
    curl \
    gnupg \
    git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents to the container
COPY ./src /var/www

# Change ownership of the application directory
RUN chown -R www-data:www-data /var/www

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]
