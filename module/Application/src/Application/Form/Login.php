<?php


namespace Application\Form;

use Zend\Form\Form;

class Login extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array (
            'name' => 'email',
            'type'  => 'Email',
            'attributes' => array ('class' => 'form-control', 'placeholder' => 'Correo', 'required' => true,),
        ));
        $this->add(array (
            'name' => 'passwd',
            'type'  => 'Password',
            'attributes' => array ('class' => 'passwd form-control', 'placeholder' => 'Contraseña', 'required' => true,),
        ));
        $this->add(array (
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => array ('class' => 'btn btn-default', 'value' => 'Entrar'),
        ));
    }
}

