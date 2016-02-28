<?php

class LoginController extends BaseController
{
    public function indexAction()
    {
        if (!isset($_SESSION['auth'])) {
            include('../app/views/login.php');
            return;
        } else {
            header('Location: /');
            exit;
        }
    }
}
