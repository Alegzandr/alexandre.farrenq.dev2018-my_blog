<?php

class SignupController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');


        $valid = true;
        $errors = [];

        $username = htmlentities($_POST['username']);
        $first_name = htmlentities($_POST['first-name']);
        $last_name = htmlentities($_POST['last-name']);
        $mail = htmlentities($_POST['mail']);
        $password = htmlentities($_POST['password']);
        $password2 = htmlentities($_POST['password2']);

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
            $errors['password'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($password) < 8) {
            $errors['password'] = '<span class="errors">8 caractères min</span>';
            $valid = false;
        }

        if (!isset($password2) || empty($password2)) {
            $errors['password2'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif ($password2 !== $password) {
            $errors['password2'] = '<span class="errors">Non identiques</span>';
            $valid = false;
        }

        $errors['valid'] = $valid;

        if ($valid) {
            $timestamp = time();
            $hash = hash('sha256', strrev($timestamp) . $password . '\Rand0msalT/');

            $errors['create'] = SignupModel::create(
                $this->pdo,
                $username,
                $first_name,
                $last_name,
                $mail,
                $hash,
                $timestamp
            );
        }

        echo(json_encode($errors));
    }
}
