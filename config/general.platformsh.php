<?php

// Set the project-specific entropy value, used for generating one-time
// keys and such.
if (isset($_ENV['PLATFORM_PROJECT_ENTROPY']) && empty($settings['*']['securityKey'])) {
    $settings['*']['securityKey'] = $_ENV['PLATFORM_PROJECT_ENTROPY'];
}
