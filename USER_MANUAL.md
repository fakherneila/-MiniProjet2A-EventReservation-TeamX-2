# Event Reservation System - User Manual

## Features Overview

### For Users

1. **Browse Events**: View all upcoming events with images and details
2. **Search Events**: Search by title or location
3. **Reserve Seats**: Book seats for events you're interested in
4. **View Details**: See complete event information

### For Administrators

1. **Event Management**: Create, edit, delete events
2. **Reservation Management**: View and manage all reservations
3. **Dashboard**: View statistics and analytics

## How to Use

### Finding Events

- Visit the homepage to see all events
- Use the search bar to filter events
- Click on any event card to view details

### Making a Reservation

1. Click "Reserve Now" on any event
2. Fill in your details in the modal form
3. Confirm your reservation
4. Receive confirmation

### Admin Access

- Login with admin credentials
- Access dashboard at /admin/dashboard
- Manage events and reservations

## API Endpoints (for developers)

### Authentication

- POST /api/login_check - Get JWT token
- POST /api/register - Register new user

### Events API

- GET /api/events - List all events
- GET /api/events/{id} - Get event details
- POST /api/events - Create event (admin)
- PUT /api/events/{id} - Update event (admin)
- DELETE /api/events/{id} - Delete event (admin)

### Reservations API

- GET /api/reservations - List reservations (admin)
- POST /api/reservations - Create reservation
- DELETE /api/reservations/{id} - Delete reservation (admin)

## Troubleshooting

### Common Issues

1. **Cannot reserve**: Ensure you're logged in
2. **Event not showing**: Check if date is in the future
3. **Permission denied**: Contact administrator

### Support

For technical support, email: support@eventreservation.com
