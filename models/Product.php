<?php

class Product

{
    const SHOW_BY_DEFAULT = 3;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();
        $query = 'SELECT * FROM product WHERE status = 1 ORDER BY id DESC LIMIT ' . $count;
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $productsList[] = $row;
        }
        return $productsList;
    }
/**
 * Проверка описание
 * @return  <p>test</p>
 * @param $count
 */
    public static function getRecProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();
        $query = 'SELECT * FROM product WHERE status = 1 AND is_recommended=1 ORDER BY id DESC LIMIT ' . $count;
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $productsList[] = $row;
        }

        return $productsList;
    }



    public static function getProductsByCategoryId($categoryId, $limit = self::SHOW_BY_DEFAULT, $offset = 1)
    {
        $db = Db::getConnection();
        $productsList = array();
        $query = 'SELECT * FROM product WHERE status = 1 AND category_id=' . $categoryId . ' ORDER BY id DESC LIMIT '
            . $limit . ' OFFSET ' . ($offset - 1) * $limit;
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $productsList[] = $row;
        }
        return $productsList;
    }

    public static function getProductById($productId)
    {
        $db = Db::getConnection();

        $query = 'SELECT * FROM product WHERE  status = 1 AND id=' . $productId;
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $productsList = $row;
        }
        return $productsList;
    }

    public static function getTotalProductsByCategoryId($categoryId)
    {
        $db = Db::getConnection();
        $query = 'SELECT COUNT(id) AS count FROM product WHERE status = 1 AND category_id=' . $categoryId;

        $result = mysqli_query($db, $query);


        $total = mysqli_fetch_assoc($result);

        return $total['count'];
    }
    public static function getTotalProducts()
    {
        $db = Db::getConnection();
        $query = 'SELECT COUNT(id) AS count FROM product WHERE status = 1';

        $result = mysqli_query($db, $query);


        $total = mysqli_fetch_assoc($result);

        return $total['count'];
    }

}