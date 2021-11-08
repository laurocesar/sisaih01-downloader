FROM php:7.4-apache
RUN apt-get update && apt-get install -y \
  wget \
  && rm -rf /var/lib/apt/lists/*
ADD src/main/php/sisaih01 /var/www/html