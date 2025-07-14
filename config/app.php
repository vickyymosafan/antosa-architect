<?php

/**
 * Application Configuration
 */

// Site information
define('SITE_NAME', 'Antosa Architect');
define('SITE_DESCRIPTION', 'Mewujudkan Desain Impian Anda');

// Dynamic site URL based on environment
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

// Check if running on Railway
if (isset($_ENV['RAILWAY_ENVIRONMENT']) || isset($_SERVER['RAILWAY_ENVIRONMENT'])) {
    // Railway automatically provides HTTPS
    $siteUrl = 'https://' . $host;
} elseif (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false) {
    // Local development
    $siteUrl = 'http://localhost/arsitek';
} else {
    // Default
    $siteUrl = $protocol . '://' . $host;
}

define('SITE_URL', $siteUrl);

// Directory paths
define('ROOT_DIR', dirname(__DIR__));
define('APP_DIR', ROOT_DIR . '/app');
define('VIEWS_DIR', ROOT_DIR . '/views');
define('PUBLIC_DIR', ROOT_DIR . '/public');

// Contact information
define('COMPANY_EMAIL', 'info@antosa-architect.com');
define('COMPANY_PHONE', '+62 851 8952 3863');
define('COMPANY_WHATSAPP', '+62 851-8952-3863');
define('COMPANY_WHATSAPP_NUMBER', '6285189523863'); // WhatsApp format without + and spaces
define('COMPANY_ADDRESS', 'Bernady Land, Cluster Camelia Blok E6, Puring, Slawu, Kec. Patrang, Kabupaten Jember, Jawa Timur 68116');
define('OFFICE_HOURS', 'Senin - Jumat: 08:00 - 17:00');

// Social media
define('SOCIAL_INSTAGRAM', 'https://instagram.com/antosa_architect');
define('SOCIAL_FACEBOOK', 'https://facebook.com/antosa.architect');
define('SOCIAL_TWITTER', 'https://twitter.com/antosa_architect');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/antosa-architect');

// SEO Settings
define('META_KEYWORDS', 'arsitektur, desain rumah, konstruksi, arsitek profesional, desain interior');
