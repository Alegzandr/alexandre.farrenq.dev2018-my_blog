<?php

class AuthModel
{
    public static function authCookie($pdo, $username, $password)
    {
        $q = $pdo->prepare('
            SELECT username, password
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        if(hash('sha256', $result['password']) === $password) {
            $_SESSION['auth'] = array($result);
            setcookie('auth', $user_id, time() + 3600 * 24 * 3, '/', null, null, true);
        } else {
            setcookie('auth', '', time() - 3600, '/', null, null, true);
        }
    }

    public static function authUser($pdo, $username, $password)
    {
        $q = $pdo->prepare('
            SELECT username, password
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        if($password === $result['password']) {
            $_SESSION['auth'] = array($result);
        }
    }
}