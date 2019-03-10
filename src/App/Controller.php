<?php

namespace App;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Flash\Messages;
use Slim\Views\PhpRenderer;
use Slim\Http\Request;
use Slim\Http\Response;

class Controller
{

    protected $container;
    /**
     * @var PhpRenderer
     */
    protected $renderer;
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var Messages
     */
    protected $flash;
    /**
     * @var Session
     */
    protected $session;

    private $allow = '';
    /**
     * @var PDO
     */
    protected $db;
    /**
     * Controller constructor.
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {
        $this->renderer = $container->get('renderer');
        $this->logger = $container->get('logger');
        $this->flash = $container->get('flash');
        $this->session = $container->get('session');
        $this->db = $container->get('db');

        $this->container = $container;
    }

    /**
     * invoke
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function __invoke($request, $response, $args)
    {
        if ($this->allow && !$this->isAuthenticated($this->allow)) {
            return $response->withRedirect('/login');
        }
        $response = $this->index($request, $response, $args);
        return $response;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function index($request, $response, $args)
    {
        return $response;
    }

    /**
     * @param $role
     * @return bool
     */
    public function isAuthenticated($role)
    {
        $authenticated = $this->getProfile();
        return ($authenticated && $role == $authenticated['role']);
    }

    /**
     * @param $user_id
     * @param string $role
     * @param array $profile
     */
    public function authorization($user_id, $role = 'user', $profile = [])
    {
        $profile['user_id'] = $user_id;
        $profile['role'] = $role;
        $this->session->set('authenticated', $profile);
    }

    /**
     * @return array|null
     */
    public function getProfile(){
        return $this->session->get('authenticated');
    }
}
