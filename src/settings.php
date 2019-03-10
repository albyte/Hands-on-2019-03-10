<?php
return [
    'settings' => [
        'debug' => true,
        'storage'=> ['path' => ROOT_DIR.'logs/debug_bar'],
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        // Database settings
        'db' => [
            'host' => 'mysql',
            'user' => 'root',
            'pass' => 'oneforallallinone',
            'dbname' => 'timecard',
        ],
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/templates/',
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
//            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'path' => ROOT_DIR . '/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
