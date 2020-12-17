<?php


class Cart
{
    public static function addProduct($id)
    {

        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }

    }

    public static function saveOrder()
    {

        if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
            $userId = $_SESSION['auth'];
            $saleData = json_encode(self::showMeCart(),JSON_UNESCAPED_UNICODE);
            $link = Db::getConnection();
            $query = 'INSERT INTO sales (`user_id`, `sale_data`) VALUES  (\''.$userId.'\', \''.$saleData.'\')';
            $result = mysqli_query($link, $query);
            if ($result) {
                return true;
            }
        }
        else{
            $saleData = json_encode(self::showMeCart(),JSON_UNESCAPED_UNICODE);
            $link = Db::getConnection();
            $query = 'INSERT INTO sales (`sale_data`) VALUES  ( \''.$saleData.'\')';
            $result = mysqli_query($link, $query);
            if ($result) {
                return true;
            }
        }
        return false;

    }

    public static function counter()
    {
        $counter = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $counter += $value;
            }
        }
        return $counter;
    }

    public static function clearCart()
    {
        if(isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        return true;
    }

    public static function sum()
    {
        $sum = 0;
        $allData = Cart::showMeCart();
        foreach ($allData as $value) {
            $sum += $value['price'] * $value['number'];

        }
        return $sum;
    }


    public static function removeProduct($id)
    {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($key == $id) {
                    if ($_SESSION['cart'][$key] == 1) {
                        unset($_SESSION['cart'][$key]);
                    } else {
                        $_SESSION['cart'][$key]--;
                    }
                }


            }
        }
    }

    public static function showMeCart()
    {
        $cart = array();
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $number) {
                $tempCart = Product::getProductById($id);
                $tempCart1 = array('number' => $number);


                $carttemp = array_merge($tempCart, $tempCart1);
                //adump($carttemp);
                $cart[] = $carttemp;
            }
        }
        return $cart;
    }
}