<?
require_once ROOT . '/views/include/header.php';
?>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-912 padding-right">
                    <div class="product-details"><!--product-details-->
                        <h1>Оформление заказа</h1>


                        <? if (!$sendok) { ?>
                            Всего выбрано <?= $total ?> товаров на сумму <?= $sum ?> руб.<br>
                            <?
                            if (!empty($errors)) {
                                foreach ($errors as $error) {
                                    echo 'Ошибка ' . $error . '<br>';
                                }
                            }

                            ?>
                            <form method="post">
                                <input type="text" name="username" value="<? if (isset($userName)) echo $userName; ?>"
                                       placeholder="Имя">
                                <input type="text" name="usercomment"
                                       value="<? if (isset($userComment)) echo $userComment; ?>"
                                       placeholder="Сообщение ">
                                <button type="submit" name="send" value="sendme">Отправить письмо</button>

                            </form>
                        <? } else { ?>
                            Письмо отправлено
                        <? } ?>
                        <? if (isset($otvet)&&$otvet) { ?>
                            Данные сохранены
                        <? } ?>

                        <? if (isset($pusto)&&$pusto) { ?>
                            Пустая корзина
                        <? } ?>
                    </div>

                </div><!--/product-details-->

            </div>
        </div>
        </div>
    </section>


    <br/>
    <br/>

<?
require_once ROOT . '/views/include/footer.php';
?>