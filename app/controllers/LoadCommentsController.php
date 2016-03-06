<?php

class LoadCommentsController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');

        $comments = CommentModel::showComments($this->pdo, htmlentities($_POST['id']));

        if (isset($_SESSION['auth'])) {
            $needed = $_SESSION['auth']['username'];
        } else {
            $needed = '';
        }

        for ($i = 0; $i < count($comments); $i++) {
            if ($comments[$i]['author'] == $needed) {
                $comments[$i]['author'] = 'Moi';
            }
        }

        echo(json_encode($comments));
    }
}