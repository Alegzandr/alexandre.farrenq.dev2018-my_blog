<?php

class IndexController extends BaseController
{
    public function indexAction()
    {
        // Login by cookie
        if (isset($_COOKIE['auth'])) {
            $auth = htmlentities($_COOKIE['auth']);
            if (!empty($auth)) {
                $auth = explode('ce28', $auth);
                AuthModel::authCookie($this->pdo, $auth[0], $auth[1]);
            }
        }

        include('../app/views/home.php');
        return;
    }
}
