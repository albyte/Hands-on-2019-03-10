<?php
namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class Logout extends \App\Controller{

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response, $args) {
        $this->session->set('authenticated', null);
        return $response->withRedirect('/login');
    }
}