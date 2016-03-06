<?php

class EditProfileController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');

        $valid = true;
        $errors = [];

        $username = trim(ucwords(strtolower(htmlentities($_POST['username']))));
        $first_name = trim(ucwords(strtolower(htmlentities($_POST['first-name']))));
        $last_name = trim(ucwords(strtolower(htmlentities($_POST['last-name']))));
        $mail = trim(htmlentities(strtolower($_POST['mail'])));
        $password = trim(htmlentities($_POST['password']));
        $password2 = trim(htmlentities($_POST['password2']));

        $old_username = $_SESSION['auth']['username'];
        $id = ProfileModel::getID($this->pdo, $old_username);
        $timestamp = ProfileModel::getTimestamp($this->pdo, $old_username);

        if (!isset($username) || empty($username)) {
            $errors['username'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($username) < 6) {
            $errors['username'] = '<span class="errors">6 caractères min</span>';
            $valid = false;
        } elseif (strlen($username) > 24) {
            $errors['username'] = '<span class="errors">24 caractères max</span>';
            $valid = false;
        }

        if (!isset($first_name) || empty($first_name)) {
            $errors['firstName'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($first_name) < 2) {
            $errors['firstName'] = '<span class="errors">2 caractères min</span>';
            $valid = false;
        } elseif (strlen($first_name) > 32) {
            $errors['firstName'] = '<span class="errors">32 caractères max</span>';
            $valid = false;
        }

        if (!isset($last_name) || empty($last_name)) {
            $errors['lastName'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($last_name) < 2) {
            $errors['lastName'] = '<span class="errors">2 caractères min</span>';
            $valid = false;
        } elseif (strlen($last_name) > 32) {
            $errors['lastName'] = '<span class="errors">32 caractères max</span>';
            $valid = false;
        }

        if (!isset($mail) || empty($mail)) {
            $errors['mail'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = '<span class="errors">Format incorrect</span>';
            $valid = false;
        }

        if (!isset($password) || empty($password)) {
            $password = SigninModel::getPassword($this->pdo, $old_username);
            $hash = $password;
            $empty_pass = true;
        } elseif (strlen($password) < 8) {
            $errors['password'] = '<span class="errors">8 caractères min</span>';
            $valid = false;
        } else {
            $hash = hash('sha256', strrev($timestamp) . $password . '\Rand0msalT/');
        }

        if (!isset($password2) || empty($password2)) {
            if (isset($empty_pass)) {
                $password2 = $password;
            } else {
                $errors['password2'] = '<span class="errors">Non saisi</span>';
                $valid = false;
            }
        } elseif ($password2 !== $password) {
            $errors['password2'] = '<span class="errors">Non identiques</span>';
            $valid = false;
        }

        $errors['valid'] = $valid;

        if ($valid) {
            ProfileModel::editUser(
                $this->pdo,
                $id,
                $old_username,
                $username,
                $first_name,
                $last_name,
                $mail,
                $hash
            );

            // Update session variables
            unset($_SESSION);
            session_destroy();
            setcookie('auth', '', time() - 3600, '/', null, null, true);

            session_start();
            AuthModel::authUser($this->pdo, $username, $hash);
        }

        echo(json_encode($errors));
    }
}