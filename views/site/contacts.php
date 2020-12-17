<?
require_once ROOT . '/views/include/header.php';
?>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-12 padding-right">
                    <div class="product-details"><!--product-details-->
                        <h2 class="r1ow">
                            <h2>РЕГИСТРАЦИЯ</h2>

                                <?
                                if (!empty($errors)) {
                                    foreach ($errors as $error) {
                                        echo 'Ошибка ' . $error . '<br>';
                                    }
                                }

                                ?>

                                <form method="post">
                                    <input type="text" name="username" value="<? if(isset($userName)) echo $userName; ?>" placeholder="Имя">
                                    <input type="text" name="usercomment" value="<? if(isset($userComment)) echo $userComment;?>" placeholder="Сообщение ">
                                    <button type="submit" name="send" value="sendme">Отправить письмо</button>

                                </form>

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