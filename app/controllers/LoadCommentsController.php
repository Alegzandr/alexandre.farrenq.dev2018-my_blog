<?php

class LoadCommentsController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');

        echo(json_encode(CommentModel::showComments($this->pdo, htmlentities($_POST['id']))));
    }
}