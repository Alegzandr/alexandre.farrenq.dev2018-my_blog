<?php

class ProfileModel
{
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
}