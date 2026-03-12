#!/bin/bash

echo "Fixing permissions for Event Reservation System..."

# Fix local permissions
sudo chown -R $(whoami):$(whoami) .
sudo chmod -R 755 .
sudo chmod -R 777 var
sudo chmod -R 777 public/uploads
mkdir -p var/log
touch var/log/dev.log
chmod 666 var/log/dev.log

# Fix container permissions
docker-compose exec -u root php chown -R www-data:www-data /var/www/html
docker-compose exec -u root php chmod -R 755 /var/www/html
docker-compose exec -u root php chmod -R 777 /var/www/html/var
docker-compose exec -u root php chmod -R 777 /var/www/html/public/uploads
docker-compose exec -u root php touch /var/www/html/var/log/dev.log
docker-compose exec -u root php chmod 666 /var/www/html/var/log/dev.log

echo "Permissions fixed successfully!"
