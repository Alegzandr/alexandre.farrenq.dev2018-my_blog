<?php

class ArticleController extends BaseController
{
    public function indexAction()
    {
        if (empty(explode('/', $_SERVER['REQUEST_URI'], 4)[2])) {
            header('Location : /');
            exit;
        } else {
            $article_id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
        }

        if (ArticleModel::exists($this->pdo, $article_id)) {
            include('../app/views/article.php');
            return;
        }
    }
}