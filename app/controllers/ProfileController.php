<?php

class ProfileController extends BaseController
{
    public function indexAction()
    {
        $url_composants = explode('/', $_SERVER['REQUEST_URI'], 4);

        if (isset($_SESSION['auth'])) {
            header('Location: /profile/' . strtolower($_SESSION['auth']['username']));
            exit;
        } elseif (
            !empty($url_composants[2]) && $url_composants[2] != 'edit'
            || !empty($url_composants[2]) && $url_composants[2] != 'new'
        ) {
            include('../app/views/profile.php');
            return;
        } elseif ($url_composants[2] == '') {
            header('Location: /');
            exit;
        }
    }

    public function editAction()
    {
        if (isset($_SESSION['auth'])) {
            include('../app/views/editprofile.php');
            return;
        } else {
            header('Location: /login');
            exit;
        }
    }
}