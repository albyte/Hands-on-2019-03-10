<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->any('/login', \App\Controller\Login::class);
$app->any('/t/[{login_id}]', \App\Controller\Time::class);
$app->any('/', \App\Controller\Home::class);
$app->any('/logout', \App\Controller\Logout::class);

$authAction = function ($request, $response, $next) {
    $response->getBody()->write('AuthBEFORE');
    $response = $next($request, $response);
    $response->getBody()->write('AuthAFTER');

    return $response;
};
$app->get('/asfaset/[{name}]', function (Request $request, Response $response, array $args) {
    $this->logger->info("login");
    $response = $this->renderer->render($response, 'index.phtml', $args);
//    $response = $response->withJson(["response" => "Hello, $name","args" => $args], 200);
    return $response;
})->add($authAction);

$app->get('/setting', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Setting");
    echo "setting";
    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
});