<?php
header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');


$valid = true;
$errors = [];

$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);

if (!isset($username) || empty($username)) {
    $errors['username'] = '<span class="errors">Non saisi</span>';
    $valid = false;
}

if (!isset($password) || empty($password)) {
    $errors['password'] = '<span class="errors">Non saisi</span>';
    $valid = false;
}

$errors['valid'] = $valid;

if ($valid) {
    // Login user
} else {
    echo(json_encode($errors));
}
