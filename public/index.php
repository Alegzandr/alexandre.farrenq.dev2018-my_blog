<?php
require_once('../config/init.php');

$called_url = $_SERVER['REQUEST_URI'];
$url_composants = explode('/', $called_url, 4);
if (isset($url_composants[1])) {
    if (strlen($url_composants[1]) == 0) {
        $controller_name = 'index';
    } else {
        $controller_name = $url_composants[1];
    }

} else {
    $controller_name = 'index';
}
if (isset($url_composants[2])) {
    // Exceptions to 404 when we need to read info from URL
    if ($url_composants[1] == 'profile' && $url_composants[2] == 'edit') {
        $action_name = 'edit';
    } elseif ($url_composants[1] == 'profile' && $url_composants[2] == 'delete') {
        $action_name = 'delete';
    } elseif ($url_composants[1] == 'profile') {
        $action_name = 'index';
    } elseif ($url_composants[1] == 'edit') {
        $action_name = 'index';
    } elseif ($url_composants[1] == 'article') {
        $action_name = 'index';
    } elseif ($url_composants[1] == 'deletearticle') {
        $action_name = 'index';
    } elseif ($url_composants[1] == 'editcomment') {
        $action_name = 'index';
    } elseif ($url_composants[1] == 'deletecomment') {
        $action_name = 'index';
    } else {
        $action_name = $url_composants[2];
    }
} else {
    $action_name = 'index';
}
$class_name = ucfirst($controller_name)
    . 'Controller';
global $pdo;
try {
    $controller = new $class_name($pdo);
} catch (Exception $e) {
    $controller = new ErrorController($pdo);
}
$action = strtolower($action_name) . 'Action';
if (!method_exists($controller, $action)) {
    $controller = new ErrorController($pdo);
    $action = 'e404';
}
$result = $controller->$action();
echo $result;
