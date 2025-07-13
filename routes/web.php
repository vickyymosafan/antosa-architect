<?php

/**
 * Web Routes
 *
 * Define the routes for the web application using associative array
 */

$routes = [
    // Main pages
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index'
    ],

    // API endpoints
    '/api/send-inquiry' => [
        'controller' => 'ApiController',
        'action' => 'sendInquiry',
        'method' => 'POST'
    ],
    '/api/subscribe-newsletter' => [
        'controller' => 'ApiController',
        'action' => 'subscribeNewsletter',
        'method' => 'POST'
    ],
    '/api/hero-data' => [
        'controller' => 'ApiController',
        'action' => 'getHeroData',
        'method' => 'GET'
    ],
    '/api/services-data' => [
        'controller' => 'ApiController',
        'action' => 'getServicesData',
        'method' => 'GET'
    ],
    '/api/portfolio-data' => [
        'controller' => 'ApiController',
        'action' => 'getPortfolioData',
        'method' => 'GET'
    ],
    '/api/about-data' => [
        'controller' => 'ApiController',
        'action' => 'getAboutData',
        'method' => 'GET'
    ],
    '/api/stats' => [
        'controller' => 'ApiController',
        'action' => 'getStats',
        'method' => 'GET'
    ],

    // Form submission endpoints (legacy support)
    '/send-inquiry' => [
        'controller' => 'ApiController',
        'action' => 'sendInquiry',
        'method' => 'POST'
    ],
];

return $routes;
