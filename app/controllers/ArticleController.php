<?php

class ArticleController
{
    public function indexAction()
    {
        header('Location: /');
        exit;
    }

    public function newAction()
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