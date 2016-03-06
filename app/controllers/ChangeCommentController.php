<?php

class ChangeCommentController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');

        $valid = true;
        $errors = [];

        if (CommentModel::exists($this->pdo, htmlentities($_POST['id']))) {
            $id = htmlentities($_POST['id']);
        } else {
            return (json_encode($errors['id'] = '<span class="errors">Cet article n\'existe pas</span>'));
        }

        $content = trim(htmlentities($_POST['content']));
        $timestamp = time();

        if (!isset($content) || empty($content)) {
            $errors['content'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($content) > 200) {
            $errors['content'] = '<span class="errors">200 caractères max</span>';
            $valid = false;
        }

        $errors['valid'] = $valid;

        if ($valid) {
            CommentModel::edit($this->pdo, $id, $content, $timestamp);
        }

        echo(json_encode($errors));
    }
}