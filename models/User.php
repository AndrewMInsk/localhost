<?php


class User
{
    static public function register($name, $mail, $password)
    {
        $db = Db::getConnection();

        $query = "INSERT INTO user(`name`,`email`,`password`) VALUES ('$name', '$mail', '$password')";

        if (mysqli_query($db, $query)) {
            return 'Вы зарегистрированы';
        } else
            return 'we have an error';

    }

    static public function checkName($name)
    {
        if (strlen($name) <= 2) {
            return false;
        } else
            return true;
    }

    static public function checkPassword($password)
    {
        if (strlen($password) < 6) {
            return false;
        } else
            return true;
    }

    static public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else
            return false;
    }

    public static function checkComment($comment)
    {
        if (strlen($comment) < 7) {
            return false;
        } else return true;
    }

    static public function changePassAndName($pass, $name, $id)
    {
        $db = Db::getConnection();
        $query = 'UPDATE  user SET name=\'' . $name . '\', password=\'' . $pass . '\' WHERE id = ' . $id;
        return mysqli_query($db, $query);
    }

    static public function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $query = 'SELECT * from user WHERE email=\'' . $email . '\'';


        $result = mysqli_query($db, $query);


        if ($row = mysqli_fetch_assoc($result)) {
            return false;
        } else
            return true;

    }

    public static function checkLogged()
    {
        if (isset($_SESSION['auth'])) {
            return $_SESSION['auth'];
        } else {
            header('Location: /user/login/');
        }
    }

    public static function isLogged()
    {
        if (isset($_SESSION['auth'])) {
            return $_SESSION['auth'];
        } else {
            return false;
        }
    }

    public static function getNameById($id)
    {
        $link = Db::getConnection();
        $query = "SELECT name FROM user WHERE id=$id";

        $result = mysqli_query($link, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['name'];
        } else {
            return false;
        }
    }

    public static function getPasswordById($id)
    {
        $link = Db::getConnection();
        $query = "SELECT password FROM user WHERE id=$id";

        $result = mysqli_query($link, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['password'];
        } else {
            return false;
        }
    }

    static public function auth($email, $password)
    {
        $db = Db::getConnection();
        $query = 'SELECT * from user WHERE email=\'' . $email . '\' AND password=\'' . $password . '\'';
        $result = mysqli_query($db, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['id'];
        } else {
            return false;
        }

    }

    public static function getSales($userId)
    {
        $db = Db::getConnection();
        $sales = array();
        $query = 'SELECT * from sales WHERE user_id=' . $userId;
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $sales[] = json_decode($row['sale_data'], true);
        }
        return $sales;


    }
}