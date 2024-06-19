# Dockerfile for Laravel Backend
FROM php:8.3-fpm
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo mbstring exif pcntl bcmath gd \
    && docker-php-ext-install mysqli pdo_mysql  # Install MySQLi and PDO MySQL extensions

# Set working directory
WORKDIR /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www

# Install application dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www

EXPOSE 9000
CMD ["php-fpm"]
