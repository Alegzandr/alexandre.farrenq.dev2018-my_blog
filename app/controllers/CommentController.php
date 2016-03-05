<?php

class CommentController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');


        $valid = true;
        $errors = [];

        $id = htmlentities($_POST['article']);
        $user = $_SESSION['auth']['username'];
        $comment = htmlentities($_POST['comment']);
        $timestamp = time();

        if(!ArticleModel::exists($this->pdo, $id)) {
            $errors['article'] = '<span class="errors">Cet article n\'existe pas</span>';
            $valid = false;
        } elseif (!isset($comment) || empty($comment)) {
            $errors['comment'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($comment) > 200) {
            $errors['comment'] = '<span class="errors">200 caractères max</span>';
            $valid = false;
        }

        $errors['valid'] = $valid;

        if ($valid) {
            CommentModel::create($this->pdo, $id, $user, $comment, $timestamp);
        }

        echo(json_encode($errors));
    }
}