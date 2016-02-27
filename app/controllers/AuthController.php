<?php

class AuthController
{
    public static function authUser($pdo, $username, $password)
    {
        if (isset($_COOKIE['auth'])) {
            $auth = htmlentities($_COOKIE['auth']);
            $auth = explode('ce28', $auth);

            AuthModel::authCookie($pdo, $auth[0], $auth[1]);
        } else {
            AuthModel::authUser($pdo, $username, $password);
        }
    }
}