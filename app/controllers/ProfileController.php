<?php

class ProfileController extends BaseController
{
    public function indexAction()
    {
        if (isset($_SESSION['auth'])) {
            header('Location: /profile/' . strtolower($_SESSION['auth']['username']));
            exit;
        } else {
            header('Location: /login');
            exit;
        }
    }

    public function alegzandrAction()
    {
        include('../app/views/alegzandr.php');
        return;
    }

    public function tretiakoffAction()
    {
        include('../app/views/tretiakoff.php');
        return;
    }
}