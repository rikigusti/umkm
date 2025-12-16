FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Set document root ke public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Copy project
COPY . /var/www/html/

# Permission
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
