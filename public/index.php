<?php
date_default_timezone_set('Asia/Tokyo');
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
define('ROOT_DIR', realpath(__DIR__ . '/..'));

require ROOT_DIR . '/vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require ROOT_DIR . '/src/settings.php';
$app = new \Slim\App($settings);

//require ROOT_DIR . '/src/lib/Session.php';

// Set up dependencies
require ROOT_DIR . '/src/dependencies.php';

// Register middleware
require ROOT_DIR . '/src/middleware.php';

// Register routes
require ROOT_DIR . '/src/routes.php';

// Run app
$app->run();
