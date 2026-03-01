# MiniProjet2A-EventReservation-TeamX-2

A production-ready Symfony event reservation system with modern authentication methods.

## Project Description

This project is a complete event reservation system built with Symfony 6.4 that allows users to browse events, reserve seats, and administrators to manage events and reservations. The system features both traditional authentication and modern passkeys (WebAuthn) for passwordless login.

## Features

### User Features
- **Authentication**: Register, Login with username/password, Login with Passkeys (WebAuthn), Logout
- **Event Browsing**: Display events with pagination, Search events
- **Event Details**: View event details including title, description, date, location, seats, image
- **Reservation System**: Reserve seats with name, email, and phone

### Admin Features
- **Admin Dashboard**: Overview of events and reservations
- **Event Management**: Create, Edit, Delete events with image upload
- **Reservation Management**: View reservations by event, Filter reservations, Delete reservations

## Technology Stack

### Backend
- **Symfony**: 6.4
- **PHP**: 8.4+
- **Doctrine ORM**: Database management
- **MySQL**: 8.0
- **JWT**: LexikJWTAuthenticationBundle for API authentication
- **WebAuthn**: Passkeys authentication

### Frontend
- **Twig**: Templating engine
- **Bootstrap 5**: Responsive UI framework
- **Vanilla JavaScript**: Interactive features

### DevOps
- **Docker**: Containerization
- **Docker Compose**: Multi-container orchestration
- **Nginx**: Web server
- **phpMyAdmin**: Database management interface

## Installation Instructions

### Prerequisites
- Docker and Docker Compose installed
- Git

### Setup Steps

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/MiniProjet2A-EventReservation-TeamX-2.git
cd MiniProjet2A-EventReservation-TeamX-2
