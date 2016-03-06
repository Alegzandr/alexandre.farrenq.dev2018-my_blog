<?php

class DeleteArticleController extends BaseController
{
    public function indexAction()
    {
        if (empty(explode('/', $_SERVER['REQUEST_URI'], 4)[2])) {
            header('Location: /');
            exit;
        } else {
            $article_id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
        }

        if (ArticleModel::exists($this->pdo, $article_id)) {
            if (
                $_SESSION['auth']['username'] === ArticleModel::getAuthor($this->pdo, $article_id)
                || $_SESSION['auth']['permissions'] === 'superadmin'
            ) {
                ArticleModel::delete($this->pdo, $article_id);
                header('Location: /');
                exit;
            }
        } else {
            header('Location: /404');
            exit;
        }
    }
}