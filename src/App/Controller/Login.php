<?php
namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class Login extends \App\Controller{

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response, $args) {
        $message = null;
        $user_id = '';
        $password = '';
        if ($request->isPost()) {
            $user_id = $request->getParam('user_id');
            $password = $request->getParam('password');
            $user = $this->container->get('modelUser');
            $profile = $user->getProfile($user_id, $password);
            if ($profile) {
                $this->authorization($user_id,'user',$profile);
                return $response->withRedirect('/');
            }
            $message = 'アカウントまたはパスワードが違います';
        }
        return $this->renderer->render($response, 'login.phtml', [
            'user_id' => $user_id,
            'password' => $password,
            'message' => $message
        ]);
    }
}