<?php
header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');


$valid = true;
$errors = [];
$success = [];

if (!empty($_POST)) {
    $username = htmlentities($_POST['username']);
    $first_name = htmlentities($_POST['first-name']);
    $last_name = htmlentities($_POST['last-name']);
    $mail = htmlentities($_POST['mail']);
    $password = htmlentities($_POST['password']);
    $password2 = htmlentities($_POST['password2']);

    // Checking conditions ...

    if ($valid) {
        $errors['valid'] = $valid;

        echo(json_encode($success));
    } else {
        $errors['valid'] = $valid;

        http_response_code(400);
        echo(json_encode($errors));
    }
} else {
    $errors['empty'] = '<span class="errors">Aucune donnée dans le formulaire</span>'
    $errors['valid'] = $valid;

    http_response_code(400);
    echo(json_encode($errors);
}
