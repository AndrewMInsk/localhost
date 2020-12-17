<?php


class Category
{
    public static function getCategoriesList()
    {
        $categories = array();
        $db = Db::getConnection();
        $query = 'SELECT * FROM category ORDER BY sort_order DESC';
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        return $categories;
    }
}