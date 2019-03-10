<?php
namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class Home extends \App\Controller{
    private $allow = 'user';
    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response, $args) {
        $profile = $this->getProfile();
        return  $response->withRedirect('/t/'.$profile['login_id']);
    }
}