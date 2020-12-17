<?php


class News
{
    public static function getNewsList()
    {
        $news = array();
        $db = Db::getConnection();
        $query = 'SELECT * FROM news';
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $news[] = $row;
        }
        return $news;
    }

    public static function getNewsById($id)
    {
        $db = Db::getConnection();
        $query = 'SELECT * FROM news WHERE id = ' . $id;
        $result = mysqli_query($db, $query);

        return mysqli_fetch_assoc($result);
    }

}