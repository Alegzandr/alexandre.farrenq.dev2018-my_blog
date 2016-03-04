<?php

class ProfileController extends BaseController
{
    public function indexAction()
    {
        $user = ucwords(strtolower(explode('/', $_SERVER['REQUEST_URI'], 4)[2]));

        if (isset($_SESSION['auth'])) {
            header('Location: /profile/' . strtolower($_SESSION['auth']['username']));
            exit;
        } elseif (ProfileModel::exists($this->pdo, $user) == true) {
            include('../app/views/profile.php');
            return;
        } else {
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