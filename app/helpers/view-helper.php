<?php

/**
 * View Helper Functions
 */

/**
 * Render a view file with optional data
 * 
 * @param string $view Path to the view file (without .php extension)
 * @param array $data Data to be passed to the view
 * @return void
 */
function view($view, $data = [])
{
    // Extract data to make variables available in view
    extract($data);
    
    $viewPath = VIEWS_DIR . '/' . $view . '.php';
    
    if (!file_exists($viewPath)) {
        throw new Exception("View file not found: $viewPath");
    }
    
    // Start output buffering
    ob_start();
    require $viewPath;
    $content = ob_get_clean();
    
    echo $content;
}

/**
 * Generate an asset URL
 * 
 * @param string $path Path to the asset file
 * @return string Full URL to the asset
 */
function asset($path)
{
    return SITE_URL . '/assets/' . ltrim($path, '/');
}

/**
 * Generate a URL to a route
 * 
 * @param string $path Path relative to the site URL
 * @return string Full URL
 */
function url($path = '')
{
    return SITE_URL . '/' . ltrim($path, '/');
}


