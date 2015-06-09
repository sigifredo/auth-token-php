<?php


namespace Application\Controller;

use JWT;
use Zend\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        $response = $this->getResponse();
        $response->getHeaders()->clearHeaders()->addHeaderLine('Content-Type', 'application/json');

        if ($this->getRequest()->isPost())
        {
            $data = $this->getRequest()->getPost()->toArray();
            $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');

            $authAdapter = new AuthAdapter($dbAdapter, 'user', 'username', 'password');
            $authAdapter->setIdentity($data['username'])->setCredential(sha1($data['password']));
            $result = $auth->authenticate($authAdapter);

            if ($result->isValid())
            {
                $user = (object) array ('iat' => time(), 'exp' => time() + 300, 'user' => $authAdapter->getResultRowObject(array ('id', 'username')));
                $jwt = JWT::encode($user, 'auth-example');

                $response->setContent(json_encode (array ('code' => 0, 'token' => $jwt)));
            }
            else
                $response->setContent(json_encode (array ('code' => 1, 'token' => null)));
        }
        else
            $response->setContent(json_encode (array ('code' => 2, 'token' => null)));

        return $this->response;
    }
}
