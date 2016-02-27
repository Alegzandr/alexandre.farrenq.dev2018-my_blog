<?php

class SignoutController extends BaseController
{
    public function indexAction()
    {
        $_SESSION = array();
        session_destroy();

        setcookie('login', '');
        setcookie('hash', '');
    }
}
