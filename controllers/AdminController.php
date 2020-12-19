<?php


class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        require_once ROOT . '/views/site/admin/index.php';
    }
}