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

        // if ...
        $errors['valid'] = $valid;

        if ($valid) {
            // model
        }

        echo(json_encode($errors));
    }
}