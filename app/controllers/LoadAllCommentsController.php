<?php

/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 06/03/2016
 * Time: 14:56
 */
class LoadAllCommentsController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');

        echo(json_encode(CommentModel::showAllComments($this->pdo)));
    }
}