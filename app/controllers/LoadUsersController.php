<?php

class LoadUsersController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');

        echo(json_encode(ProfileModel::showLastUsers($this->pdo)));
    }
}