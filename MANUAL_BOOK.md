# 📖 MANUAL BOOK - ANTOSA ARCHITECT WEBSITE

## 📋 DAFTAR ISI

1. [Gambaran Umum Proyek](#gambaran-umum-proyek)
2. [Arsitektur Sistem](#arsitektur-sistem)
3. [Struktur Direktori](#struktur-direktori)
4. [Konfigurasi Aplikasi](#konfigurasi-aplikasi)
5. [Routing System](#routing-system)
6. [Controller Layer](#controller-layer)
7. [Model Layer](#model-layer)
8. [View Layer](#view-layer)
9. [Asset Management](#asset-management)
10. [JavaScript Components](#javascript-components)
11. [Deployment Configuration](#deployment-configuration)
12. [API Endpoints](#api-endpoints)
13. [Security Features](#security-features)
14. [Performance Optimization](#performance-optimization)
15. [Troubleshooting](#troubleshooting)

---

## 🏗️ GAMBARAN UMUM PROYEK

### Informasi Dasar
- **Nama Proyek**: Antosa Architect
- **Deskripsi**: Website profesional untuk layanan arsitektur dan desain
- **Teknologi**: PHP Custom MVC Framework
- **Frontend**: HTML5, CSS3, JavaScript, Tailwind CSS
- **Deployment**: Railway Platform
- **Version Control**: Git & GitHub

### Fitur Utama
- ✅ Responsive Design untuk semua perangkat
- ✅ Portfolio showcase dengan filter dinamis
- ✅ Contact form dengan validasi
- ✅ Newsletter subscription
- ✅ FAQ section dengan accordion
- ✅ Service showcase dengan animasi
- ✅ Client testimonials
- ✅ SEO optimized
- ✅ WhatsApp integration
- ✅ Social media integration

---

## 🏛️ ARSITEKTUR SISTEM

### Pattern Architecture
Aplikasi menggunakan **Custom MVC (Model-View-Controller)** pattern:

```
Request → Router → Controller → Model → View → Response
```

### Flow Diagram
```
User Request
    ↓
public/index.php (Entry Point)
    ↓
config/app.php (Load Configuration)
    ↓
routes/web.php (Route Resolution)
    ↓
app/controllers/* (Controller Logic)
    ↓
app/models/* (Data Processing)
    ↓
views/* (Template Rendering)
    ↓
Response to User
```

---

## 📁 STRUKTUR DIREKTORI

```
antosa-architect/
├── 📁 app/                          # Application core
│   ├── 📁 controllers/              # Controller classes
│   │   ├── 📄 HomeController.php    # Main page controller
│   │   └── 📄 ApiController.php     # API endpoints controller
│   ├── 📁 helpers/                  # Helper functions
│   │   └── 📄 view-helper.php       # View rendering helpers
│   └── 📁 models/                   # Data models
│       └── 📄 ContentModel.php      # Content data provider
├── 📁 config/                       # Configuration files
│   └── 📄 app.php                   # Main app configuration
├── 📁 public/                       # Public web directory
│   ├── 📁 assets/                   # Static assets
│   │   ├── 📁 images/               # Image files
│   │   ├── 📁 js/                   # JavaScript files
│   │   └── 📁 videos/               # Video files
│   └── 📄 index.php                 # Application entry point
├── 📁 routes/                       # Route definitions
│   └── 📄 web.php                   # Web routes
├── 📁 views/                        # View templates
│   ├── 📁 layouts/                  # Layout templates
│   │   ├── 📄 main.php              # Main layout
│   │   └── 📁 partials/             # Partial templates
│   │       └── 📄 footer.php        # Footer partial
│   └── 📄 home.php                  # Home page template
├── 📄 composer.json                 # PHP dependencies
├── 📄 railway.json                  # Railway deployment config
├── 📄 nixpacks.toml                 # Nixpacks build config
├── 📄 Procfile                      # Process configuration
└── 📄 README.md                     # Project documentation
```

---

## ⚙️ KONFIGURASI APLIKASI

### File: `config/app.php`

#### Konstanta Utama
```php
// Site Information
SITE_NAME = 'Antosa Architect'
SITE_DESCRIPTION = 'Mewujudkan Desain Impian Anda'
SITE_URL = [Dynamic based on environment]

// Directory Paths
ROOT_DIR = [Project root directory]
APP_DIR = [Application directory]
VIEWS_DIR = [Views directory]
PUBLIC_DIR = [Public directory]

// Contact Information
COMPANY_EMAIL = 'info@antosa-architect.com'
COMPANY_PHONE = '+62 851 8952 3863'
COMPANY_WHATSAPP = '+62 851-8952-3863'
COMPANY_WHATSAPP_NUMBER = '6285189523863'
COMPANY_ADDRESS = 'Bernady Land, Cluster Camelia Blok E6...'
OFFICE_HOURS = 'Senin - Jumat: 08:00 - 17:00'

// Social Media
SOCIAL_INSTAGRAM = 'https://www.instagram.com/antosa_architect/'
SOCIAL_LINKEDIN = 'https://linkedin.com/company/antosa-architect'

// SEO Settings
META_KEYWORDS = 'arsitektur, desain rumah, konstruksi...'
```

#### Environment Detection
```php
// Dynamic URL configuration based on environment:
// - Railway: HTTPS automatically
// - Local: http://localhost/arsitek
// - Default: Protocol detection
```

---

## 🛣️ ROUTING SYSTEM

### File: `routes/web.php`

#### Route Structure
```php
$routes = [
    'URI' => [
        'controller' => 'ControllerName',
        'action' => 'methodName',
        'method' => 'HTTP_METHOD' // Optional
    ]
];
```

#### Defined Routes
```php
'/' => [
    'controller' => 'HomeController',
    'action' => 'index'
],
'/api/send-inquiry' => [
    'controller' => 'ApiController', 
    'action' => 'sendInquiry',
    'method' => 'POST'
],
'/api/subscribe-newsletter' => [
    'controller' => 'ApiController',
    'action' => 'subscribeNewsletter', 
    'method' => 'POST'
]
```

#### Route Resolution Process
1. Parse REQUEST_URI
2. Remove base path for local development
3. Match against routes array
4. Validate HTTP method if specified
5. Instantiate controller and call action
6. Return 404 if route not found
7. Return 405 if method not allowed

---

## 🎮 CONTROLLER LAYER

### HomeController.php

#### Purpose
Handles main landing page requests and data preparation.

#### Methods
```php
public function index()
```
- Loads ContentModel
- Retrieves all section data:
  - Hero section data
  - About section data  
  - Services data
  - Portfolio data
  - Client data
  - FAQ data
  - Footer data
- Renders home view with data

#### Data Flow
```
HomeController::index()
    ↓
ContentModel::get*Data() methods
    ↓
view('home', $data)
    ↓
views/home.php rendering
```

### ApiController.php

#### Purpose
Handles API requests for form submissions and dynamic content.

#### Methods

##### `sendInquiry()`
- **HTTP Method**: POST
- **Purpose**: Process contact form submissions
- **Validation**:
  - Name: Required, non-empty
  - Email: Required, valid email format
  - Phone: Optional
  - Message: Required, non-empty
- **Security**: Input sanitization with `sanitizeInput()`
- **Response**: JSON format
- **Logging**: Inquiry data logged for tracking

##### `subscribeNewsletter()`
- **HTTP Method**: POST  
- **Purpose**: Process newsletter subscriptions
- **Validation**: Valid email format required
- **Security**: Input sanitization
- **Response**: JSON format
- **Logging**: Subscription data logged

#### Security Methods
```php
private function sanitizeInput($input)
private function logInquiry($data)
private function logSubscription($data)
```

---

## 📊 MODEL LAYER

### ContentModel.php

#### Purpose
Centralized data provider for all website content.

#### Static Methods

##### `getHeroData()`
Returns hero section configuration:
```php
[
    'title' => 'Main hero title',
    'subtitle' => 'Hero subtitle', 
    'cta_text' => 'Call to action text',
    'cta_link' => 'WhatsApp link',
    'background_video' => 'Video file path'
]
```

##### `getAboutData()`
Returns about section content:
```php
[
    'title' => 'Tentang Kami',
    'description' => 'Company description...',
    'vision' => 'Company vision statement',
    'mission' => [
        'Mission point 1',
        'Mission point 2',
        // ... more mission points
    ],
    'stats' => [
        ['number' => '10+', 'label' => 'Tahun Pengalaman'],
        ['number' => '500+', 'label' => 'Proyek Selesai'],
        // ... more stats
    ]
]
```

##### `getServicesData()`
Returns services section configuration:
```php
[
    'title' => 'Layanan Kami',
    'description' => 'Service description...',
    'services' => [
        [
            'title' => 'Service name',
            'description' => 'Service description',
            'image' => 'Image path',
            'features' => ['Feature 1', 'Feature 2', ...]
        ],
        // ... more services
    ]
]
```

##### `getPortfolioData()`
Returns portfolio section data:
```php
[
    'title' => 'Portfolio Kami',
    'description' => 'Portfolio description...',
    'categories' => ['all' => 'Semua', ...],
    'category_icons' => ['residential' => 'fas fa-home', ...],
    'projects' => [
        [
            'id' => 'unique_id',
            'title' => 'Project title',
            'category' => 'Category key',
            'image' => 'Image path',
            'description' => 'Project description',
            'details' => [
                'location' => 'Location',
                'area' => 'Area size',
                'year' => 'Completion year',
                'client' => 'Client name'
            ]
        ],
        // ... more projects
    ]
]
```

##### `getClientsData()`
Returns client showcase data:
```php
[
    'title' => 'Klien Kami',
    'description' => 'Client description...',
    'main_image' => 'Main showcase image'
]
```

##### `getFaqData()`
Returns FAQ section data:
```php
[
    'title' => 'Frequently Asked Questions',
    'description' => 'FAQ description...',
    'faqs' => [
        [
            'question' => 'Question text',
            'answer' => 'Answer text'
        ],
        // ... more FAQs
    ]
]
```

##### `getFooterData()`
Returns footer section data:
```php
[
    'company_info' => [
        'name' => 'Company name',
        'description' => 'Company description',
        'address' => 'Company address',
        'phone' => 'Phone number',
        'email' => 'Email address',
        'hours' => 'Office hours'
    ],
    'quick_links' => [
        ['text' => 'Link text', 'url' => 'URL'],
        // ... more links
    ],
    'services_links' => [
        ['text' => 'Service name', 'url' => 'URL'],
        // ... more services
    ],
    'social_media' => [
        ['platform' => 'instagram', 'url' => 'URL', 'icon' => 'Icon class'],
        // ... more social media
    ]
]
```

---

## 🎨 VIEW LAYER

### Layout Structure

#### Main Layout: `views/layouts/main.php`
- **Purpose**: Base template for all pages
- **Sections**:
  - HTML head with meta tags
  - CSS includes (Tailwind, AOS, custom styles)
  - Navigation structure
  - Main content area
  - JavaScript includes
  - Footer

#### Key Features:
- **Responsive Design**: Mobile-first approach
- **SEO Optimization**: Meta tags, structured data
- **Performance**: Deferred JavaScript loading
- **Accessibility**: ARIA labels, semantic HTML
- **Animation**: AOS (Animate On Scroll) integration

### Home Page: `views/home.php`

#### Section Structure:
1. **Hero Section**
   - Video background
   - Animated text with Magic UI
   - CTA button with WhatsApp integration
   - Interactive grid pattern background

2. **About Section**
   - Company description
   - Vision and mission
   - Statistics counter
   - Animated elements

3. **Services Section**
   - Service cards with images
   - Feature lists
   - Hover effects
   - Responsive grid layout

4. **Portfolio Section**
   - Category filtering
   - Grid/List view toggle
   - Project cards with details
   - Modal functionality
   - Lazy loading

5. **Client Section**
   - Client showcase
   - Image gallery
   - Testimonials

6. **FAQ Section**
   - Accordion functionality
   - Expandable Q&A items
   - Search functionality

7. **Contact Section**
   - Contact form
   - Company information
   - Map integration
   - WhatsApp integration

### Partial Templates

#### Footer: `views/layouts/partials/footer.php`
- Company information
- Quick links
- Service links  
- Social media links
- Newsletter subscription
- Copyright information

---

## 🎯 ASSET MANAGEMENT

### Directory Structure
```
public/assets/
├── images/           # Image assets
│   ├── 1.webp       # Portfolio image 1
│   ├── 2.webp       # Portfolio image 2
│   ├── 4.webp       # Portfolio image 3
│   ├── 5.webp       # Portfolio image 4
│   ├── client_kami.webp  # Client showcase
│   ├── jasa1.webp   # Service 1 image
│   ├── jasa2.webp   # Service 2 image
│   └── jasa3.webp   # Service 3 image
├── js/              # JavaScript files
│   ├── app.js       # Main application JS
│   ├── contact.js   # Contact form handling
│   ├── faq.js       # FAQ functionality
│   ├── portfolio.js # Portfolio interactions
│   ├── services.js  # Service animations
│   └── slider.js    # Slider functionality
└── videos/          # Video assets
    ├── promosi#1.mp4 # Promotional video 1
    ├── promosi#2.mp4 # Promotional video 2
    └── promosi#3.mp4 # Promotional video 3
```

### Asset Helper Functions

#### `asset($path)`
- **Purpose**: Generate full URL to asset files
- **Usage**: `asset('images/logo.png')`
- **Output**: `https://domain.com/assets/images/logo.png`

#### `url($path)`
- **Purpose**: Generate full URL to application routes
- **Usage**: `url('contact')`
- **Output**: `https://domain.com/contact`

### Image Optimization
- **Format**: WebP for better compression
- **Naming**: Descriptive filenames
- **Loading**: Lazy loading implementation
- **Responsive**: Multiple sizes for different devices

---

## ⚡ JAVASCRIPT COMPONENTS

### app.js - Main Application
```javascript
// Core functionality:
- AOS initialization
- Smooth scrolling
- Navigation handling
- General UI interactions
```

### contact.js - Contact Form
```javascript
// Features:
- Form validation
- AJAX submission
- Success/error handling
- Input sanitization
- WhatsApp integration
```

### portfolio.js - Portfolio Management
```javascript
// Features:
- Category filtering
- Grid/List view toggle
- Modal functionality
- Image lazy loading
- Search functionality
- Sorting options
```

### faq.js - FAQ Accordion
```javascript
// Features:
- Accordion expand/collapse
- Search functionality
- Keyboard navigation
- Smooth animations
```

### services.js - Service Animations
```javascript
// Features:
- Hover effects
- Card animations
- Interactive elements
- Responsive behavior
```

### slider.js - Image Slider
```javascript
// Features:
- Image carousel
- Touch/swipe support
- Auto-play functionality
- Navigation controls
- Responsive design
```

---

## 🚀 DEPLOYMENT CONFIGURATION

### Railway Platform

#### railway.json
```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "startCommand": "php -S 0.0.0.0:$PORT -t public",
    "restartPolicyType": "ON_FAILURE", 
    "restartPolicyMaxRetries": 10
  }
}
```

#### nixpacks.toml
```toml
[phases.setup]
nixPkgs = ['php82', 'php82Packages.composer']

[phases.build] 
cmds = ['echo "Build phase completed"']

[start]
cmd = 'php -S 0.0.0.0:$PORT -t public'
```

#### Procfile
```
web: php -S 0.0.0.0:$PORT -t public
```

### Environment Variables
- `PORT`: Server port (provided by Railway)
- `RAILWAY_ENVIRONMENT`: Environment detection
- `HTTP_HOST`: Domain detection

### Deployment Process
1. Code push to GitHub
2. Railway detects changes
3. Nixpacks builds environment
4. PHP dependencies installed
5. Application started on specified port
6. Health checks performed
7. Traffic routed to new deployment

---

## 🔌 API ENDPOINTS

### POST /api/send-inquiry

#### Purpose
Process contact form submissions from website visitors.

#### Request Format
```http
POST /api/send-inquiry
Content-Type: application/x-www-form-urlencoded

name=John+Doe&email=john@example.com&phone=123456789&message=Hello
```

#### Request Parameters
- `name` (required): Full name of inquirer
- `email` (required): Valid email address
- `phone` (optional): Phone number
- `message` (required): Inquiry message

#### Response Format
```json
// Success Response (200)
{
    "success": true,
    "message": "Terima kasih! Pesan Anda telah diterima. Tim kami akan menghubungi Anda segera."
}

// Error Response (400)
{
    "success": false,
    "message": "Data tidak valid",
    "errors": [
        "Nama lengkap wajib diisi",
        "Format email tidak valid"
    ]
}

// Method Not Allowed (405)
{
    "success": false,
    "message": "Method not allowed"
}
```

#### Validation Rules
- Name: Non-empty string
- Email: Valid email format
- Message: Non-empty string
- All inputs: HTML sanitized

#### Security Features
- Input sanitization
- CSRF protection (implicit)
- Rate limiting (server-level)
- IP address logging

### POST /api/subscribe-newsletter

#### Purpose
Process newsletter subscription requests.

#### Request Format
```http
POST /api/subscribe-newsletter
Content-Type: application/x-www-form-urlencoded

email=subscriber@example.com
```

#### Request Parameters
- `email` (required): Valid email address for subscription

#### Response Format
```json
// Success Response (200)
{
    "success": true,
    "message": "Terima kasih telah berlangganan newsletter kami!"
}

// Error Response (400)
{
    "success": false,
    "message": "Email tidak valid"
}
```

#### Validation Rules
- Email: Required, valid email format
- Input sanitization applied

#### Data Logging
Both endpoints log data to server logs:
```php
// Inquiry logging
[
    'name' => 'Sanitized name',
    'email' => 'Sanitized email', 
    'phone' => 'Sanitized phone',
    'message' => 'Sanitized message',
    'timestamp' => 'Y-m-d H:i:s',
    'ip_address' => 'Client IP'
]

// Newsletter logging
[
    'email' => 'Sanitized email',
    'timestamp' => 'Y-m-d H:i:s', 
    'ip_address' => 'Client IP'
]
```

---

## 🔒 SECURITY FEATURES

### Input Sanitization
```php
private function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}
```

### Validation Layers
1. **Client-side**: JavaScript form validation
2. **Server-side**: PHP validation with error messages
3. **Database**: Input sanitization before processing

### Security Headers
- Content-Type: application/json for API responses
- HTML entity encoding for XSS prevention
- Input length limitations

### Error Handling
- Graceful error responses
- No sensitive information exposure
- Proper HTTP status codes
- User-friendly error messages

### Access Control
- Method-based routing restrictions
- IP address logging for audit trails
- Request rate limiting (server-level)

---

## ⚡ PERFORMANCE OPTIMIZATION

### Frontend Optimization
- **CSS**: Tailwind CSS purging for smaller file sizes
- **JavaScript**: Deferred loading of non-critical scripts
- **Images**: WebP format for better compression
- **Animations**: Hardware-accelerated CSS animations
- **Lazy Loading**: Images loaded on scroll

### Backend Optimization
- **Caching**: Static content caching
- **Compression**: Gzip compression enabled
- **Database**: Optimized data structures in ContentModel
- **Memory**: Efficient PHP memory usage

### Loading Performance
- **Critical CSS**: Inline critical styles
- **Resource Hints**: DNS prefetch for external resources
- **Minification**: CSS and JS minification
- **CDN**: External libraries loaded from CDN

### Mobile Optimization
- **Responsive Images**: Multiple image sizes
- **Touch Optimization**: Touch-friendly interface
- **Viewport**: Proper viewport configuration
- **Performance**: Mobile-first loading strategy

---

## 🔧 TROUBLESHOOTING

### Common Issues

#### 1. 404 Page Not Found
**Symptoms**: Routes not working, 404 errors
**Causes**:
- Incorrect route definition in `routes/web.php`
- Missing controller file
- Wrong controller/action names

**Solutions**:
```php
// Check route definition
$routes = [
    '/your-route' => [
        'controller' => 'YourController',
        'action' => 'yourMethod'
    ]
];

// Verify controller exists
app/controllers/YourController.php

// Check method exists in controller
public function yourMethod() { ... }
```

#### 2. View Not Found
**Symptoms**: "View file not found" error
**Causes**:
- Incorrect view path in controller
- Missing view file
- Wrong file extension

**Solutions**:
```php
// Check view call in controller
view('your-view', $data); // looks for views/your-view.php

// Verify file exists
views/your-view.php

// Check view helper function
function view($view, $data = []) {
    $viewPath = VIEWS_DIR . '/' . $view . '.php';
    // ...
}
```

#### 3. Asset Loading Issues
**Symptoms**: CSS/JS/Images not loading
**Causes**:
- Incorrect asset paths
- Missing files
- Server configuration issues

**Solutions**:
```php
// Use asset helper function
<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
<script src="<?= asset('js/app.js') ?>"></script>
<img src="<?= asset('images/logo.png') ?>" alt="Logo">

// Check SITE_URL configuration
define('SITE_URL', $siteUrl);

// Verify files exist in public/assets/
```

#### 4. API Endpoints Not Working
**Symptoms**: AJAX requests failing, API errors
**Causes**:
- Wrong HTTP method
- Missing CSRF protection
- Incorrect endpoint URL
- Server configuration

**Solutions**:
```javascript
// Check HTTP method
fetch('/api/send-inquiry', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams(formData)
});

// Verify endpoint exists in routes
'/api/send-inquiry' => [
    'controller' => 'ApiController',
    'action' => 'sendInquiry',
    'method' => 'POST'
]
```

#### 5. Environment Configuration Issues
**Symptoms**: Wrong URLs, configuration not loading
**Causes**:
- Environment detection failing
- Missing environment variables
- Incorrect configuration

**Solutions**:
```php
// Check environment detection in config/app.php
if (isset($_ENV['RAILWAY_ENVIRONMENT']) || isset($_SERVER['RAILWAY_ENVIRONMENT'])) {
    $siteUrl = 'https://' . $host;
} elseif (strpos($host, 'localhost') !== false) {
    $siteUrl = 'http://localhost/arsitek';
}

// Verify constants are defined
echo SITE_URL; // Should output correct URL
echo APP_DIR;  // Should output correct path
```

### Debugging Tools

#### 1. Error Logging
```php
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log errors to file
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');
```

#### 2. Debug Information
```php
// Add debug output in controllers
public function index() {
    echo "Debug: Controller called\n";
    var_dump($_SERVER['REQUEST_URI']);
    // ... rest of method
}
```

#### 3. Network Debugging
```javascript
// Check network requests in browser console
console.log('Sending request to:', url);
fetch(url)
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => console.log('Response data:', data))
    .catch(error => console.error('Error:', error));
```

### Performance Monitoring

#### 1. Page Load Time
```javascript
// Measure page load time
window.addEventListener('load', function() {
    const loadTime = performance.now();
    console.log('Page loaded in:', loadTime, 'ms');
});
```

#### 2. API Response Time
```php
// Add timing to API endpoints
$startTime = microtime(true);
// ... API logic
$endTime = microtime(true);
$executionTime = ($endTime - $startTime) * 1000;
error_log("API execution time: {$executionTime}ms");
```

#### 3. Memory Usage
```php
// Monitor memory usage
echo "Memory usage: " . memory_get_usage(true) . " bytes\n";
echo "Peak memory: " . memory_get_peak_usage(true) . " bytes\n";
```

---

## 📞 SUPPORT & MAINTENANCE

### Contact Information
- **Developer**: Vicky (Project Developer)
- **Company**: Antosa Architect
- **Email**: info@antosa-architect.com
- **Phone**: +62 851 8952 3863

### Maintenance Schedule
- **Daily**: Monitor server status and error logs
- **Weekly**: Check performance metrics and user feedback
- **Monthly**: Update dependencies and security patches
- **Quarterly**: Full system review and optimization

### Backup Strategy
- **Code**: Git repository with regular commits
- **Assets**: Regular backup of public/assets directory
- **Logs**: Archive log files monthly
- **Configuration**: Backup configuration files

### Update Procedures
1. Test changes in local environment
2. Commit changes to version control
3. Deploy to staging environment (if available)
4. Test functionality thoroughly
5. Deploy to production
6. Monitor for issues post-deployment

---

**© 2024 Antosa Architect - Manual Book v1.0**
**Last Updated**: December 2024
**Document Status**: Complete and Current
