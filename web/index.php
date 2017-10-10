<?php
/**
 * Craft web bootstrap file
 */

// Set path constants
define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');

define('CRAFT_LICENSE_KEY_PATH', CRAFT_BASE_PATH . '/license/license.key');

define('CRAFT_SITE_URL', 'https://test-t6dnbai-myv5b63mxtdnw.us.platform.sh/');

#printf("Raw constant for license key path: %s<br />\n", CRAFT_LICENSE_KEY_PATH);
#printf("Raw constant for site Url: %s<br />\n", CRAFT_SITE_URL);

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH.'/autoload.php';

#$path = new \craft\services\Path();
#$config = new \craft\services\Config();
#printf("License path: %s<br />\n", $path->getLicenseKeyPath());
//print_r("Site URL: %s<br />\n", $config->getConfigSettings(\craft\services\Config::CATEGORY_GENERAL)->siteUrl);

// Load dotenv?
if (file_exists(CRAFT_BASE_PATH.'/.env')) {
    (new Dotenv\Dotenv(CRAFT_BASE_PATH))->load();
}

// Load and run Craft
define('CRAFT_ENVIRONMENT', getenv('ENVIRONMENT') ?: 'production');
$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/web.php';
$app->run();
