<?php
namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class Time extends \App\Controller{
    private $allow = 'user';
    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response, $args) {
        $profile = $this->getProfile();
        if($profile['login_id'] != $args['login_id']){
            return $response->withRedirect('/t/'.$profile['login_id']);
        }
        return $this->renderer->render($response, 'time.phtml', [
            'login_id' => $profile['login_id'],
            'date' => date('Y-m-d'),
            'start_dt' => '',
            'end_dt' => ''
        ]);
    }
}