<?php


abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::isLogged();
        if ($userId) {
            $user = User::getUserById($userId);
            if ($user['role'] == 'admin') {
                return true;
            } else {
                die('<a href="/user/login">Вам не хватает прав, перелогиньтесь</a>');
            }

        } else {
            die('<a href="/user/login">Залогиньтесь</a>');
        }
    }
}