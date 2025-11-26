# 1. Frontend build (Node)
FROM node:24 AS frontend
WORKDIR /app

# Install frontend dependencies
COPY package*.json ./
RUN npm install

# Build assets
COPY . .
RUN npm run build


# 2. Backend (PHP + Composer)
FROM php:8.4-fpm

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip curl git \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

# Copy Laravel source
COPY . .

# Install Composer (or use composer:latest image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install backend dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy built frontend assets to final image
COPY --from=frontend /app/public ./public
