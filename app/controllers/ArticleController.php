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
        include('../app/views/newarticle.php');
        return;
    }
}