<?php

// Creates articles

class NewController extends BaseController
{
    public function indexAction()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth']['permissions'] != 'user') {
            include('../app/views/newarticle.php');
            return;
        } else {
            header('Location: /');
            exit;
        }
    }
}