<?php


class UserController
{
    public $categoriesList;

    function __construct()
    {
        $this->categoriesList = Category::getCategoriesList();
    }

    public function actionLogout()
    {
        unset($_SESSION['auth']);
        require_once ROOT . '/views/site/cabinet.php';

    }

    public function actionHistory()
    {
        $sales = array();
        $userId = User::checkLogged();
        $userName = User::getNameById($userId);
        $sales = User::getSales($userId);
        require_once ROOT . '/views/site/history.php';

    }

    public function actionEdit()
    {
        $errors = array();
        $userId = User::checkLogged();
        $userName = User::getNameById($userId);
        $password = User::getPasswordById($userId);

        if (isset($_POST['change'])) {
            $userName = $_POST['username'];
            $password = $_POST['userpassword'];
            if (User::checkName($userName)) {
                // echo 'name ok';
            } else {
                $errors[] = 'Имя короткое';
            }

            if (User::checkPassword($password)) {
                //  echo 'pass ok';
            } else {
                $errors[] = 'Пароль короткий';
            }

            if (empty($errors)) {

                $updateSuccess = User::changePassAndName($password, $userName, $userId);

            }
        }

        require_once ROOT . '/views/site/edit.php';

    }


    public function actionRegister()
    {
        $name = '';
        $mail = '';
        $password = '';
        $errors = array();
        if (isset($_POST['subm'])) {
            $name = $_POST['username'];
            $mail = $_POST['usermail'];
            $password = $_POST['userpassword'];

            if (User::checkName($name)) {
                // echo 'name ok';
            } else {
                $errors[] = 'Имя короткое';
            }

            if (User::checkPassword($password)) {
                //  echo 'pass ok';
            } else {
                $errors[] = 'Пароль короткий';
            }

            if (User::checkEmail($mail)) {
                // echo 'mail ok';
            } else {
                $errors[] = 'Почта неверная';
            }

            if (User::checkEmailExists($mail)) {
                // echo 'mail ok';
            } else {
                $errors[] = 'Почта занята';
            }

            if (empty($errors)) {
                $result = User::register($name, $mail, $password);
            }
        }
        require_once ROOT . '/views/site/register.php';
    }

    public function actionLogin()
    {

        $password = '';
        $mail = '';

        // adump($_POST);
        $errors = array();
        if (isset($_POST['enter'])) {
            $password = $_POST['userpassword'];
            $mail = $_POST['usermail'];


            if (User::checkPassword($password)) {
                // echo 'name ok';
            } else {
                $errors[] = 'Пароль короткий';
            }
            if (User::checkEmail($mail)) {
                // echo 'name ok';
            } else {
                $errors[] = 'Почта кривая';
            }

            if (empty($errors)) {
                if ($userId = User::auth($mail, $password)) {
                    // echo 'уря мы вошли';
                    $_SESSION['auth'] = $userId;
                    // echo $SESSION['auth'];
                    header('Location: /user/cabinet/');
                } else {
                    $errors[] = 'логин или пароль мимо';
                }
            }
        }
        require_once ROOT . '/views/site/login.php';

    }
}