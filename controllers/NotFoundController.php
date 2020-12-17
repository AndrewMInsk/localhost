<?php


class NotFoundController
{
    public function actionIndex($data)
    {
        echo $data;
        return '<br>404 controller action index';

    }
}