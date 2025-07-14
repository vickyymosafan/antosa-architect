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
];

return $routes;
