<?php

class AuthModel
{
    public static function authCookie($pdo, $username, $password)
    {
        $q = $pdo->prepare('
            SELECT *
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        if (hash('sha256', $result['password']) === $password) {
            $_SESSION['auth'] = $result;
        } else {
            CookieController::destroy();
        }
    }

    public static function authUser($pdo, $username, $password)
    {
        $q = $pdo->prepare('
            SELECT *
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        if ($password === $result['password']) {
            $_SESSION['auth'] = $result;
        }
    }
}