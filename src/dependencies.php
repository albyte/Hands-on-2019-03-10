<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// flash
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};
//session
$container['session'] = function ($c) {
    return new App\Session();
};

$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];

    $pdo = new PDO(sprintf("mysql:host=%s;dbname=%s;port=%s;charset=utf8mb4", $settings['host'], $settings['dbname'], $settings['port']), $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['modelUser'] = function ($c) {
    return new App\Model\User($c);
};