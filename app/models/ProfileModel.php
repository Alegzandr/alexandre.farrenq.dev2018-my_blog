<?php

class ProfileModel
{
    public static function exists($pdo, $username)
    {
        if ($username == '') {
            return false;
        }

        $q = $pdo->prepare('
            SELECT username
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();

        $result = $q->fetch();

        if ($result['username'] == $username) {
            return true;
        } else {
            return false;
        }
    }

    public static function getFirstName($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT username, first_name
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['first_name'];
    }

    public static function getLastName($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT username, last_name
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['last_name'];
    }

    public static function getMail($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT username, mail
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['mail'];
    }

    public static function getTimestamp($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT username, timestamp
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['timestamp'];
    }

    public static function getGroup($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT username, permissions
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['permissions'];
    }
}