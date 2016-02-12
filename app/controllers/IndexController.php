<?php

class IndexController extends AbstractController
{
    public function indexAction()
    {
        include('../app/views/home.php');
        return;
    }
}