<?php

namespace App;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;


class Model
{

    protected $container;
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var PDO
     */
    protected $db;

    /**
     * Model constructor.
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {
        $this->logger = $container->get('logger');
        $this->session = $container->get('session');
        $this->db = $container->get('db');

        $this->container = $container;
    }

}
