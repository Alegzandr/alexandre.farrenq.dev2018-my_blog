<?php

class ProfileController extends BaseController
{
    public function indexAction()
    {

        if (isset($_SESSION['auth']) && empty(explode('/', $_SERVER['REQUEST_URI'], 4)[2])) {
            $user = $_SESSION['auth']['username'];
        } else {
            $user = ucwords(strtolower(explode('/', $_SERVER['REQUEST_URI'], 4)[2]));
        }

        if (ProfileModel::exists($this->pdo, $user)) {
            include('../app/views/profile.php');
            return;
        } elseif ($user === 'Moi') {
            header('Location: /profile');
            exit;
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

    public function deleteAction()
    {
        if (isset($_SESSION['auth'])) {
            ProfileModel::deleteUser($this->pdo, $_SESSION['auth']['username']);

            header('Location: /logout');
            exit;
        } else {
            header('Location: /login');
            exit;
        }
    }
}