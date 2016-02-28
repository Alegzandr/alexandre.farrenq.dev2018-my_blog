<?php

class DashboardController
{
    public function indexAction()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth']['permissions'] === 'superadmin') {
            include('../app/views/dashboard.php');
            return;
        } else {
            header('Location: /');
            return;
        }
    }
}