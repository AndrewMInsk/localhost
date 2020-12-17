<?php
require_once ROOT . '/models/Category.php';
require_once ROOT . '/models/Product.php';
require_once ROOT . '/models/News.php';

class BlogController
{


    function actionIndex()
    {
        $newsList = News::getNewsList();

        require_once ROOT . '/views/site/news/news.php';

        echo 'BlogController actionIndex';
    }

    function actionView($newsId)
    {
        $news = News::getNewsById($newsId);
        require_once ROOT . '/views/site/news/newsSingle.php';

        echo 'BlogController actionView';
    }
}