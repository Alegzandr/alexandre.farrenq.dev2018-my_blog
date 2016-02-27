<?php

class AuthController
{
    public static function authentication()
    {
        if (isset($_COOKIE['auth'])) {
            $auth = htmlentities($_COOKIE['auth']);
            $auth = explode('ce28', $auth);

            AuthModel::authCookie($auth[0], $auth[1]);
        }
    }
}