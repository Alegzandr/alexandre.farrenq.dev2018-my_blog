<?php

class CookieController
{
    public static function create($pdo, $username, $password)
    {
        $user_id = $username . 'ce28' . hash('sha256', $password);
        setcookie('auth', $user_id, time() + 60 * 60 * 24 * 30, null, null, null, true);
    }

    public static function destroy()
    {
        setcookie('auth', '', time() - 3600, '/', null, null, true);
    }
}