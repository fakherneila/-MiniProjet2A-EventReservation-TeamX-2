# MiniProjet2A-EventReservation-TeamX

## Project Description
Event Reservation System built with Symfony 6.4 featuring:
- User authentication (JWT + Passkeys/WebAuthn)
- Event browsing with search and pagination
- Event reservation system
- Admin dashboard for event and reservation management

## Technology Stack
- Symfony 6.4
- PHP 8.4
- MySQL 8.0
- Docker
- Bootstrap 5
- JWT Authentication
- WebAuthn Passkeys

## Installation
1. Clone repository
2. Run `docker-compose up -d`
3. Run `docker-compose exec php composer install`
4. Setup database: `docker-compose exec php bin/console doctrine:database:create`
5. Update schema: `docker-compose exec php bin/console doctrine:schema:update --force`
6. Access: http://localhost:8080

## Docker Services
- PHP: http://localhost:8080
- phpMyAdmin: http://localhost:8081 (user: event_user, pass: event_password)

## Features
- ✅ User registration/login with JWT
- ✅ Passkeys (WebAuthn) authentication
- ✅ Event listing with pagination
- ✅ Search events
- ✅ Event details page
- ✅ Reservation system
- ✅ Admin dashboard
- ✅ Event CRUD operations
- ✅ Reservation management
- ✅ Responsive Bootstrap 5 UI
- ✅ Docker containerization
