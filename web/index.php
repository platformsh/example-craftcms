<?php
/**
 * Craft web bootstrap file
 */

// Set path constants
define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');

define('CRAFT_LICENSE_KEY_PATH', CRAFT_BASE_PATH . 'license/license.key');

print CRAFT_LICENSE_KEY_PATH . "<br />\n";

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH.'/autoload.php';


$path = new \craft\services\Path();
print_r("Derived path: %s<br />\n", $path->getLicenseKeyPath());

// Load dotenv?
if (file_exists(CRAFT_BASE_PATH.'/.env')) {
    (new Dotenv\Dotenv(CRAFT_BASE_PATH))->load();
}

// Load and run Craft
define('CRAFT_ENVIRONMENT', getenv('ENVIRONMENT') ?: 'production');
$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/web.php';
$app->run();
