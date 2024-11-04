# Dockerfile
FROM php:8.3-fpm

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    git \
    unzip

# Instala extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho da aplicação
WORKDIR /var/www

# Copia o código da aplicação
COPY . .

# Instala as dependências do projeto
RUN composer install --no-scripts --no-autoloader

# Define permissões para a pasta de armazenamento
RUN chown -R www-data:www-data /var/www/storage

# Instala Node.js e Yarn para o Vue.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install -g yarn

# Instala as dependências do front-end
RUN yarn install

# Executa o build da aplicação
RUN yarn build

EXPOSE 9000
CMD ["php-fpm"]
