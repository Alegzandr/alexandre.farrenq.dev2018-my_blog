<?php

class LogoutController extends BaseController
{
    public function indexAction()
    {
        unset($_SESSION);
        session_destroy();

        setcookie('auth', '', time() - 3600, '/', null, null, true);
        header('Location: /');
        exit;
    }
}
