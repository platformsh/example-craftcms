<?php

// Set the project-specific entropy value, used for generating one-time
// keys and such.
if (isset($_ENV['PLATFORM_PROJECT_ENTROPY']) && empty($settings['*']['securityKey'])) {
    $settings['*']['securityKey'] = $_ENV['PLATFORM_PROJECT_ENTROPY'];
}

// Set the site base URL from the Platform.sh routes.
if (isset($_ENV['PLATFORM_ROUTES'])) {
    $routes = json_decode(base64_decode($_ENV['PLATFORM_ROUTES']), TRUE);
    $settings['trusted_host_patterns'] = [];
    foreach ($routes as $url => $route) {
        $host = parse_url($url, PHP_URL_HOST);
        if ($host !== FALSE && $route['type'] == 'upstream' && $route['upstream'] == $_ENV['PLATFORM_APPLICATION_NAME']) {
            // Note: This won't work for wildcard-based routes. That will require
            // additional inspection of the request itself.
            $settings['*']['siteUrl'] = $host;
        }
    }
}
