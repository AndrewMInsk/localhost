<?php
require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';
require_once ROOT . '/config/Pagination.php';

class CatalogController
{

    public $categoriesList;

    function __construct()
    {
        $this->categoriesList = Category::getCategoriesList();
    }

    function actionIndex($pageId = 1)
    {
        $productsList = Product::getLatestProducts();
        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $pageId, Product::SHOW_BY_DEFAULT, 'page-' );
//echo $total;
        require_once ROOT . '/views/site/catalog/catalog.php';

        echo 'CatalogController actionIndex';
    }


    function actionShowList($categoryId, $pageId = 1)
    {

        $productsList = Product::getProductsByCategoryId($categoryId, Product::SHOW_BY_DEFAULT, $pageId);

        $total = Product::getTotalProductsByCategoryId($categoryId);
        $pagination = new Pagination($total, $pageId, Product::SHOW_BY_DEFAULT, 'page-' );
        //echo $total;

        require_once ROOT . '/views/site/catalog/catalog.php';

        echo 'CatalogController actionShowList';
    }
}