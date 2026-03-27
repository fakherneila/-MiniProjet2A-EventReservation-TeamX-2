# Event Reservation System

A production-ready Symfony event reservation system with modern authentication methods.

## Version 1.2.0 - New Features! 🚀

### Latest Updates (March 27, 2026)
- ✨ **Interactive Reservation Modal**: Beautiful modal form with validation
- 📊 **Database Integration**: Events are now stored in MySQL database
- 🔄 **Import Command**: Easy import of events via console command
- 📱 **Enhanced UI**: Loading states, success notifications, better UX
- 📚 **User Manual**: Complete documentation for users and admins

## Features

### User Features
- **Authentication**: Register, Login, Passkeys (WebAuthn), Logout
- **Event Browsing**: Pagination, search, event details
- **Reservation System**: Modal form with validation and confirmation

### Admin Features
- **Dashboard**: Statistics and analytics
- **Event Management**: CRUD operations with image upload
- **Reservation Management**: View, filter, delete reservations

## Quick Start

```bash
# Clone repository
git clone https://github.com/fakherneila/-MiniProjet2A-EventReservation-TeamX-2.git
cd -MiniProjet2A-EventReservation-TeamX-2

# Start Docker containers
docker-compose up -d

# Install dependencies
docker-compose exec php composer install

# Setup database
docker-compose exec php bin/console doctrine:database:create
docker-compose exec php bin/console doctrine:schema:update --force

# Import events
docker-compose exec php bin/console app:import-events

# Clear cache
docker-compose exec php bin/console cache:clear 
