# Utilizar a imagem PHP com FPM
FROM php:8.3-fpm

## Diretório da aplicação
ARG APP_DIR=/var/www/html

# Versão da Lib do Redis para PHP
ARG REDIS_LIB_VERSION=5.3.7

# Instalação de dependências e Supervisor
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    apt-utils \
    supervisor \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev \
    curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP
RUN docker-php-ext-install pdo_mysql pdo_pgsql pgsql xml zip pcntl gd

# Instalar e habilitar Redis para PHP
RUN pecl install redis-${REDIS_LIB_VERSION} \
    && docker-php-ext-enable redis

# Instala Node.js e npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho da aplicação
WORKDIR $APP_DIR

# Define permissões para diretórios de armazenamento e cache
RUN chown www-data:www-data $APP_DIR

COPY --chown=www-data:www-data . .
RUN rm -rf vendor

# Instala dependências do projeto PHP e Node.js
RUN composer install --no-interaction && npm install

# Copia configuração do Supervisor
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expor a porta do PHP e do Nginx
EXPOSE 9000 8080

# Iniciar o Supervisor
CMD ["/usr/bin/supervisord"]
