<?php

class LoginController extends AbstractController
{
    public function indexAction()
    {
        include('../app/views/login.php');
        return;
    }
}