# ベースイメージとして公式のPHP-Apacheイメージを使用
FROM php:7.4-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Composerをインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# 作業ディレクトリを設定
WORKDIR /var/www/html

# プロジェクトファイルをコピー
COPY . /var/www/html

# Composerを実行
RUN composer install --no-dev --optimize-autoloader

# Apacheの設定をコピー
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Apacheの再起動
RUN a2enmod rewrite
