# --- Stage 1: Build Frontend Assets ---
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# --- Stage 2: Production PHP Application ---
FROM php:8.3-cli-bookworm

# Install required system packages and libraries
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    unzip \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        gd \
        intl \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Composer environment
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_MEMORY_LIMIT=-1

WORKDIR /var/www

# Copy codebase
COPY . .

# Copy Vite build from frontend stage
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies with --ignore-platform-reqs to prevent build-time extension check aborts
RUN composer install --no-dev --no-scripts --optimize-autoloader --no-interaction --ignore-platform-reqs --verbose

# Permissions
RUN chmod -R 775 storage bootstrap/cache

ENV PORT=10000
EXPOSE 10000

RUN chmod +x ./docker/entrypoint.sh

ENTRYPOINT ["./docker/entrypoint.sh"]
