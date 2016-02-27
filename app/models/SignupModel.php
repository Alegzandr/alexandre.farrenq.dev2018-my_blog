<?php

class SignupModel
{
    public static function create(
        $pdo,
        $username,
        $first_name,
        $last_name,
        $mail,
        $password,
        $timestamp
    )
    {
        // Check if user already exists
        $q = $pdo->prepare('
            SELECT username
            FROM users
            WHERE username = :username
            ');
        $q->bindParam(':username', $username);
        $q->execute();

        $result = $q->fetch();

        if ($result['username'] == $username) {
            return '<span class="errors">Un compte utilisé déjà ce nom.</span>';
        }

        $q->closeCursor();

        // Check if email already exists
        $q = $pdo->prepare('
            SELECT mail
            FROM users
            WHERE mail = :mail
            ');
        $q->bindParam(':mail', $mail);
        $q->execute();

        $result = $q->fetch();

        if ($result['mail'] == $mail) {
            return '<span class="errors">Un compte utilisé déjà cet email.</span>';
        }

        // If it doesn't already exists, add to database
        $q = $pdo->prepare('
        INSERT INTO users
        SET username = :username,
        first_name = :first_name,
        last_name = :last_name,
        mail = :mail,
        password = :password,
        timestamp = :password
        ');
        $q->bindParam(':username', $username);
        $q->bindParam(':first_name', $first_name);
        $q->bindParam(':last_name', $last_name);
        $q->bindParam(':mail', $mail);
        $q->bindParam(':password', $password);
        $q->bindParam(':timestamp', $timestamp);
        $q->execute();
    }
}