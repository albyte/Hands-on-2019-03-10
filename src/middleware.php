<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
if ($app->getContainer()['settings']['debug']) {
    $provider = new Kitchenu\Debugbar\ServiceProvider(['storage' => ['path' => ROOT_DIR . '/logs/debug_bar']]);
    $provider->register($app);
}
