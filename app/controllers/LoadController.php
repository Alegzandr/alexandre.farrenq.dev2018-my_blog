<?php
// Loads articles for AJAX

class LoadController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        
        echo(json_encode(ArticleModel::ShowLastArticles($this->pdo)));
    }
}