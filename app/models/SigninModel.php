<?php

class SigninModel
{
    public static function login($pdo, $username, $password, $remember)
    {
        $q = $pdo->prepare('
            SELECT username, password
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();

        $result = $q->fetch();

        if ($result == false) {
            return '<span class="errors">Ce compte n\'existe pas.</span>';
        } else if ($result['password'] != $password) {
            return '<span class="errors">Mot de passe incorrect.</span>';
        }
    }

    public static function checkUsername($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT username
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();

        $result = $q->fetch();
        return $result['username'];
    }

    public static function getPassword($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT password
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();

        $result = $q->fetch();
        return $result['password'];
    }
}