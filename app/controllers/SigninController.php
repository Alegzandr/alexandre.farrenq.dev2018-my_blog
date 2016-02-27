<?php

class SigninController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');


        $valid = true;
        $errors = [];

        $username = ucwords(strtolower(htmlentities($_POST['username'])));
        $password = hash(
            'sha256',
            strrev(ProfileModel::getTimestamp($username)) . htmlentities($_POST['password']) . '\Rand0msalT/'
        );
        $remember = htmlentities($_POST['remember']);

        if (!isset($username) || empty($username)) {
            $errors['username'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        }

        if (!isset($password) || empty($password)) {
            $errors['password'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        }

        if (isset($remember)) {
            $user_id = $username . 'ce28' . hash('sha256', $password);
            setcookie('auth', $user_id, time() + 3600 * 24 * 3, '/', null, null, true);
        }

        $errors['valid'] = $valid;

        if ($valid) {
            // Login user
        } else {
            echo(json_encode($errors));
        }
    }
}
