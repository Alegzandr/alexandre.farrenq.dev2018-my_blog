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

        $username = trim(ucwords(strtolower(htmlentities($_POST['username']))));
        $password = hash(
            'sha256',
            strrev(ProfileModel::getTimestamp($this->pdo, $username)) . htmlentities($_POST['password']) . '\Rand0msalT/'
        );

        if (!isset($username) || empty($username)) {
            $errors['username'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (SigninModel::checkUsername($this->pdo, $username) !== $username) {
            $errors['username'] = '<span class="errors">N\'existe pas</span>';
            $valid = false;
        } elseif (!isset($password) || empty($password)) {
            $errors['password'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (SigninModel::getPassword($this->pdo, $username) !== $password) {
            $errors['password'] = '<span class="errors">Mauvais mot de passe</span>';
            $valid = false;
        }
        $errors['valid'] = $valid;

        if ($valid) {
            if (isset($_POST['remember'])) {
                CookieController::create($this->pdo, $username, $password);
            }

            AuthModel::authUser($this->pdo, $username, $password);
        }

        echo(json_encode($errors));
    }
}
