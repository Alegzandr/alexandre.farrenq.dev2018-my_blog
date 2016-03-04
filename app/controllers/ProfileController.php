<?php

class ProfileController extends BaseController
{
    public function indexAction()
    {

        if(isset($_SESSION['auth']) && empty(explode('/', $_SERVER['REQUEST_URI'], 4)[2])) {
            $user = $_SESSION['auth']['username'];
        } else {
            $user = ucwords(strtolower(explode('/', $_SERVER['REQUEST_URI'], 4)[2]));
        }

        if (ProfileModel::exists($this->pdo, $user)) {
            include('../app/views/profile.php');
            return;
        } else {
            header('Location: /404');
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