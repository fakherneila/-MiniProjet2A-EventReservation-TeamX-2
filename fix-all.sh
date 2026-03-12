#!/bin/bash

echo "Fixing all permissions..."

# Local permissions
echo "Fixing local permissions..."
sudo chown -R $(whoami):$(whoami) ~/event-reservation-system
chmod -R 755 ~/event-reservation-system
chmod -R 777 ~/event-reservation-system/var
chmod -R 777 ~/event-reservation-system/public/uploads
chmod -R 777 ~/event-reservation-system/templates
chmod -R 777 ~/event-reservation-system/src/Controller

# Container permissions
echo "Fixing container permissions..."
docker-compose exec -u root php chown -R www-data:www-data /var/www/html
docker-compose exec -u root php chmod -R 755 /var/www/html
docker-compose exec -u root php chmod -R 777 /var/www/html/var
docker-compose exec -u root php chmod -R 777 /var/www/html/public/uploads
docker-compose exec -u root php touch /var/www/html/var/log/dev.log
docker-compose exec -u root php chmod 666 /var/www/html/var/log/dev.log

# Clear cache
echo "Clearing cache..."
docker-compose exec php bin/console cache:clear

echo "Permissions fixed successfully!"
