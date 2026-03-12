# Changelog

## [1.1.0] - 2026-03-12

### Added
- Modern gradient design with CSS3 animations
- Hero section with parallax scrolling effect
- Live search functionality with real-time counter
- Toast notification system for user feedback
- Animated number counters for statistics
- Loading animations for form submissions
- Custom scrollbar design
- Social media links in footer
- Interactive card hover effects with transforms
- Tooltip integration using Bootstrap 5
- Confirmation dialogs for delete actions
- Breadcrumb navigation on event details
- Search debouncing for better performance
- Intersection Observer for scroll animations
- Responsive design for all screen sizes
- Permission management scripts (fix-permissions.sh, check-permissions.sh)
- Docker user mapping for better permission handling

### Changed
- Complete redesign of base template
- Enhanced event cards with better information hierarchy
- Improved form styling and validation feedback
- Updated event details page layout
- Optimized asset loading strategy
- Improved pagination design and usability
- Enhanced Docker configuration for permissions
- Updated README with frontend features

### Fixed
- Permission issues with var/log directory
- Docker container permission problems
- Pagination with search parameters
- Form validation messages display
- Mobile responsiveness issues
- CSS loading order problems
- JavaScript console errors

### Security
- Added CSRF protection for all forms
- Improved input validation
- XSS prevention in dynamic content
- Secure file upload handling

### Performance
- Lazy loading for images
- Minified CSS and JavaScript
- Browser caching optimization
- Reduced HTTP requests
- Optimized database queries

## [1.0.0] - 2026-03-01

### Added
- Initial Symfony 6.4 project setup
- Docker environment with PHP 8.4, Nginx, MySQL
- Event, Reservation, and User entities
- CRUD operations for events
- User authentication with JWT
- Passkeys (WebAuthn) support
- Admin dashboard
- Basic Bootstrap 5 styling
- Static events for demonstration
- Pagination and search functionality
