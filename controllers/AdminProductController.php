<?php


class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $productsList = Product::getAllProducts();
        require_once ROOT . '/views/site/admin/products_index.php';
    }

    static public function checkName($name)
    {
        if (strlen($name) <= 3) {
            return false;
        } else
            return true;
    }

    static public function checkPrice($price)
    {
        if ($price <= 333) {
            return false;
        } else
            return true;
    }

    public function actionDelete($id)
    {

        self::checkAdmin();
        $product = Product::getProductById($id);
        if (isset($_POST['submit'])) {
            if (Product::deleteProduct($id)) {
                header("Location: /admin/products");
            }
        }
        $productsList = Product::getAllProducts();

        require_once ROOT . '/views/site/admin/products_delete.php';
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $result = false;
        $name = "";
        $price = "";
        $categoryId = "";
        $options = array();
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $categoryId = $_POST['categoryId'];
            $errors = array();
            if (!self::checkName($_POST['name'])) {
                $errors[] = 'Название короткое';
            }
            if (!self::checkPrice($_POST['price'])) {
                $errors[] = 'Цена маловата';
            }

            if (empty($errors)) {
                $options['name'] = $name;
                $options['price'] = $price;
                $options['category_id'] = $categoryId;
                $idProduct = Product::addProduct($options);

                if ($idProduct != 0) {
                    if (is_uploaded_file($_FILES['files']['tmp_name'])) {

                        echo move_uploaded_file($_FILES['files']['tmp_name'], ROOT . '/images/upload/' . $idProduct . $_FILES['files']['name']);
                    }
                }
            } else {
                $result = 'Исправьте ошибки';
            }
        }
        require_once ROOT . '/views/site/admin/products_create.php';
    }

    public function actionEdit($productId)
    {
        self::checkAdmin();
        $result = false;
        $product = Product::getProductById($productId);
        $name = $product["name"];
        $price = $product["price"];
        $categoryId = $product["category_id"];
        $options = array();
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $categoryId = $_POST['categoryId'];
            $errors = array();
            if (!self::checkName($_POST['name'])) {
                $errors[] = 'Название короткое';
            }
            if (!self::checkPrice($_POST['price'])) {
                $errors[] = 'Цена маловата';
            }

            if (empty($errors)) {
                $options['name'] = $name;
                $options['price'] = $price;
                $options['category_id'] = $categoryId;
                $idProduct = Product::editProduct($productId, $options);

                if ($idProduct != 0) {
                    if (is_uploaded_file($_FILES['files']['tmp_name'])) {
                        echo move_uploaded_file($_FILES['files']['tmp_name'], ROOT . '/images/upload/' . $idProduct . $_FILES['files']['name']);
                    }
                }
            } else {
                $result = 'Исправьте ошибки';
            }
        }
        require_once ROOT . '/views/site/admin/products_edit.php';
    }
}