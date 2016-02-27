<?php

class AuthModel
{
    public static function authCookie($username, $password)
    {
        $q = $pdo->prepare('
            SELECT id, password
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        if(hash('sha256', $result['password']) === $password) {
            // Login user
        }
    }
}