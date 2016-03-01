<?php

class ArticleController
{
    public function indexAction()
    {
        header('Location: /login');
        exit;
    }

    public function newAction()
    {
        include('../app/views/newarticle.php');
        return;
    }

    public function coursdejsAction()
    {
        include('../app/views/coursdejs.php');
        return;
    }
}