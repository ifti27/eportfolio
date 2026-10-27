# --- Stage 1: Build Frontend Assets ---
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# --- Stage 2: PHP Application Container ---
FROM php:8.3-cli-alpine

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    oniguruma-dev \
    mariadb-connector-c-dev \
    postgresql-dev \
    bash

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    gd \
    opcache

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy application files
COPY . .

# Copy built frontend assets from Stage 1
COPY --from=frontend /app/public/build ./public/build

# Install production Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions for storage & cache
RUN chmod -R 775 storage bootstrap/cache

# Expose web port (Render & Railway default to 10000 or $PORT)
ENV PORT=10000
EXPOSE 10000

# Make entrypoint executable
RUN chmod +x ./docker/entrypoint.sh

ENTRYPOINT ["./docker/entrypoint.sh"]
