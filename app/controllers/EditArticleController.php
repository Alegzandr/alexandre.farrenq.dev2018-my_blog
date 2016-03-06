<?php

class EditArticleController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');

        $valid = true;
        $errors = [];

        if(ArticleModel::exists($this->pdo, htmlentities($_POST['id']))){
            $id = htmlentities($_POST['id']);
        } else {
            return (json_encode($errors['id'] = '<span class="errors">Cet article n\'existe pas</span>'));
        }
        $title = trim(ucfirst(strtolower(htmlentities($_POST['title']))));
        $content = trim(htmlentities($_POST['content']));

        if (!isset($title) || empty($title)) {
            $errors['title'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($title) > 51) {
            $errors['title'] = '<span class="errors">Trop long</span>';
            $valid = false;
        }
        if (!isset($content) || empty($content)) {
            $errors['content'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        }
        $errors['valid'] = $valid;

        if ($valid) {
            $errors['edit'] = ArticleModel::edit($this->pdo, $id, $title, $content, $_SESSION['auth']['username']);
        }

        echo(json_encode($errors));
    }
}