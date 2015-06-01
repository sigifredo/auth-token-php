<?php


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        return array ('form' => new \Application\Form\Login());
    }
}
