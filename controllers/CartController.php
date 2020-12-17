<?php


class CartController
{
    public static function actionAdd($id)
    {
        Cart::addProduct($id);
        $nazad = $_SERVER['HTTP_REFERER'];
        // echo 'add ok';
        header("Location: $nazad");
    }

    public static function actionAddAjax($id)
    {
        Cart::addProduct($id);

        return Cart::counter();

    }

    public static function actionRemoveAjax($id)
    {
        Cart::removeProduct($id);

        return Cart::counter();

    }

    public static function actionRemove($id)
    {
        Cart::removeProduct($id);
        $nazad = $_SERVER['HTTP_REFERER'];

        header("Location: $nazad");

    }

    public static function actionCheckout()
    {

        $total = Cart::counter();
        $sum = Cart::sum();
        if (isset($_SESSION['auth'])) {
            $userName = User::getNameById($_SESSION['auth']);
        }
        $errors = array();

        $sendok = false;
        if (isset($_POST['send'])) {
            $userName = $_POST['username'];
            $userComment = $_POST['usercomment'];
            $cart = "";
            foreach (Cart::showMeCart() as $item) {
                $cart .= 'Название ' . $item['name'] . ' Количество ' . $item['number'] . '<br>';
            }
            if (User::checkName($userName)) {
                // echo 'name ok';
            } else {
                $errors[] = 'Имя короткое';
            }

            if (User::checkComment($userComment)) {
                //  echo 'pass ok';
            } else {
                $errors[] = 'Сообщение короткое';
            }
            $pusto = false;

            if (empty($errors)) {
                if (isset($_SESSION['cart'])) {
                    mail('info@a-site.by', $userName, $userComment . $cart);
                    $sendok = true;
                    $otvet = Cart::saveOrder();
                    Cart::clearCart();
                } else {
                    $sendok = false;
                    $otvet = false;
                    $pusto = true;
                }
            }
        }


        include_once ROOT . '/views/site/checkout.php';

    }

    public static function actionShowme()
    {
        $cart = Cart::showMeCart();
        include_once ROOT . '/views/site/cart.php';

    }
}