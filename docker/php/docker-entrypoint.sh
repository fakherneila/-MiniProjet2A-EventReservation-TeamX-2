#!/bin/sh
set -e

# Set permissions
chown -R www-data:www-data /var/www/html/var
chown -R www-data:www-data /var/www/html/public/uploads
chmod -R 777 /var/www/html/var
chmod -R 777 /var/www/html/public/uploads

# Create log file if it doesn't exist
touch /var/www/html/var/log/dev.log
chmod 666 /var/www/html/var/log/dev.log

# Execute the main command
exec docker-php-entrypoint "$@"
