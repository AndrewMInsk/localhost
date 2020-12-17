<?php


class CabinetController
{
    public $categoriesList;

    function __construct()
    {
        $this->categoriesList = Category::getCategoriesList();
    }

    public function actionIndex()
    {
      $userId = User::checkLogged();
      $userName = User::getNameById($userId);
        require_once ROOT . '/views/site/cabinet.php';
    }
}