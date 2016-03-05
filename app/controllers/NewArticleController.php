<?php

class NewArticleController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');


        $valid = true;
        $errors = [];

        $title = trim(ucfirst(strtolower(htmlentities($_POST['title']))));
        $content = trim(htmlentities($_POST['content']));

        if (!isset($title) || empty($title)) {
            $errors['title'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        }
        if (!isset($content) || empty($content)) {
            $errors['content'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        }
        $errors['valid'] = $valid;

        if ($valid) {
            $errors['create'] = ArticleModel::create($this->pdo, $title, $content, $_SESSION['auth']['username']);
        }

        echo(json_encode($errors));
    }
}