<?php
header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');


$valid = true;
$errors = [];
$success = [];

if (!empty($_POST)) {
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
