<?php

class ProfileController extends AbstractController
{
    public function indexAction()
    {
        include('../app/views/profile.php');
        return;
    }
}