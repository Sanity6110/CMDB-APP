FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive \
    APACHE_DOCUMENT_ROOT=/var/www/html

# Install Apache, PHP, phpMyAdmin, and required extensions
RUN apt-get update -qq && \
    apt-get install -y --no-install-recommends \
      apache2 \
      php \
      php-mbstring \
      php-zip \
      php-gd \
      php-json \
      php-curl \
      php-mysql \
      libapache2-mod-php \
      phpmyadmin && \
    rm -rf /var/lib/apt/lists/*

# Enable PHP modules
RUN phpenmod mbstring zip

# Clear default site and deploy phpMyAdmin
RUN rm -rf /var/www/html/* && \
    cp -R /usr/share/phpmyadmin/* /var/www/html/ && \
    chown -R www-data:www-data /var/www/html

# Configure Apache alias for /phpmyadmin
RUN printf "Alias /phpmyadmin /usr/share/phpmyadmin\n<Directory /usr/share/phpmyadmin>\n    Options Indexes FollowSymLinks\n    DirectoryIndex index.php\n    Require all granted\n</Directory>\n" \
    > /etc/apache2/conf-available/phpmyadmin.conf && \
    a2enconf phpmyadmin && \
    a2enmod rewrite

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
