<?php
require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';

class SiteController
{
    public $categoriesList;

    function __construct()
    {
        $this->categoriesList = Category::getCategoriesList();
    }

    function actionIndex()
    {
        $productsList = Product::getLatestProducts(2);
        $recProductsList = Product::getRecProducts(3);

        require_once ROOT . '/views/site/index.php';

        echo 'SiteController actionIndex';
    }

    function actionContacts()
    {

        $errors = array();


        if (isset($_POST['send'])) {
            $userName = $_POST['username'];
            $userComment = $_POST['usercomment'];
            if (User::checkName($userName)) {
                // echo 'name ok';
            } else {
                $errors[] = 'Имя короткое';
            }

            if (User::checkComment($userComment)) {
                //  echo 'pass ok';
            } else {
                $errors[] = 'Сообщение короткое';
            }
            if (empty($errors)) {
                mail('info@a-site.by', $userName, $userComment);
            }
        }


        require_once ROOT . '/views/site/contacts.php';

        echo 'SiteController actionContacts';
    }
}