<?php
require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';


class ProductController
{
    public $categoriesList;

    function __construct()
    {
        $this->categoriesList = Category::getCategoriesList();
    }

    function actionView($productId)
    {

        $product = Product::getProductById($productId);
        require_once ROOT . '/views/site/productView.php';
        echo 'ProductController actionIndex ' . $productId;
    }
}