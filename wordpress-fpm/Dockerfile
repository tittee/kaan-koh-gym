FROM wordpress:5.7.2-php7.4-fpm

# Install packages under Debian
# RUN apt-get update && \
#     apt-get -y install git
# Install XDebug from source as described here:
# https://xdebug.org/docs/install
# Available branches of XDebug could be seen here:
# https://github.com/xdebug/xdebug/branches
RUN pecl install "xdebug" \
    && docker-php-ext-enable xdebug

# Copy xdebug.ini to /usr/local/etc/php/conf.d/
# COPY ./php/xdebug.ini /
# Since this Dockerfile extends the official Docker image `wordpress`,
# and since `wordpress`, in turn, extends the official Docker image `php`,
# the helper script docker-php-ext-enable (defined for image `php`)
# works here, and we can use it to enable xdebug:
# RUN docker-php-ext-enable xdebug

WORKDIR /var/www/html

EXPOSE 9000