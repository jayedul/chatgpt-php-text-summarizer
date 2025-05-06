FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    gnupg \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install zip pdo_mysql mbstring gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install NVM and Node
ENV NVM_DIR=/root/.nvm
RUN bash -c " \
    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash && \
    source $NVM_DIR/nvm.sh && \
    nvm install --lts && \
    nvm use --lts && \
    nvm alias default 'lts/*' && \
    node -v && \
    npm -v \
"

# Set working directory
WORKDIR /var/www/html

EXPOSE 80