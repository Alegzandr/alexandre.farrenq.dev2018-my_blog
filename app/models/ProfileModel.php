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

    public static function getID($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT id
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['id'];
    }

    public static function getFirstName($pdo, $username)
    {
        $q = $pdo->prepare('
            SELECT first_name
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
            SELECT last_name
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
            SELECT mail
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
            SELECT timestamp
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
            SELECT permissions
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();

        return $result['permissions'];
    }

    public static function showLastUsers($pdo)
    {
        $q = $pdo->prepare('
            SELECT *
            FROM users
            ORDER BY id DESC
            ');
        $q->execute();

        $users = [];
        while ($results = $q->fetch())
        {
            array_push($users, $results);
        }

        return $users;
    }

    public static function editUser(
        $pdo,
        $id,
        $username,
        $first_name,
        $last_name,
        $mail,
        $password
    )
    {
        $q = $pdo->prepare('
        UPDATE users
        SET username = :username,
        first_name = :first_name,
        last_name = :last_name,
        mail = :mail,
        password = :password
        WHERE id = :id
        ');
        $q->bindParam(':id', $id);
        $q->bindParam(':username', $username);
        $q->bindParam(':first_name', $first_name);
        $q->bindParam(':last_name', $last_name);
        $q->bindParam(':mail', $mail);
        $q->bindParam(':password', $password);
        $q->execute();
    }
}