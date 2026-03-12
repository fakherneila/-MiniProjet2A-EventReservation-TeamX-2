FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libssl-dev \
    default-mysql-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy custom entrypoint
COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint-custom
RUN chmod +x /usr/local/bin/docker-entrypoint-custom

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Create log directory
RUN mkdir -p /var/www/html/var/log && chmod 777 /var/www/html/var/log

USER www-data

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint-custom"]
CMD ["php-fpm"]
