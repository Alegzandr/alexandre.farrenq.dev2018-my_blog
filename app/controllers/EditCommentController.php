<?php

class EditCommentController extends BaseController
{
    public function indexAction()
    {
        if (empty(explode('/', $_SERVER['REQUEST_URI'], 4)[2])) {
            header('Location: /');
            exit;
        } else {
            $id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
        }

        if (CommentModel::exists($this->pdo, $id)) {
            if ($_SESSION['auth']['username'] === CommentModel::getAuthor($this->pdo, $id)) {
                include('../app/views/editcomment.php');
                return;
            }
        } else {
            header('Location: /404');
            exit;
        }
    }
}