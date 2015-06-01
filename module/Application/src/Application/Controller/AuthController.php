<?php


namespace Application\Controller;

use JWT;
use Zend\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        if ($this->getRequest()->isPost())
        {
            // $data = $this->getRequest()->getPost()->toArray();

            $user = (object) array ('iat' => time(), 'exp' => time() + 300);
            $jwt = JWT::encode($user, '');

            $response = $this->getResponse();
            $response->setContent(json_encode (array ('code' => 0,'response' => array ('token' => $jwt))));
            $response->getHeaders()->clearHeaders()->addHeaderLine('Content-Type', 'application/json');

            return $this->response;
        }
        else
            return array ('form' => new \Application\Form\Login());
    }
}
