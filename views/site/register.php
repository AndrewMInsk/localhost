<?
require_once ROOT . '/views/include/header.php';
?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <?
                            foreach ($this->categoriesList as $key => $item) {

                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                    href="/category/<?= $item['id'] ?>"><?= $item['name'] ?></a></h4>
                                    </div>
                                </div>
                                <?

                            }
                            ?>

                        </div><!--/category-products-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <h2 class="r1ow">
                            <h2>РЕГИСТРАЦИЯ</h2>
                            <? if (isset($result)) {
                                echo $result;
                            } else {
                                ?>
                                <?
                                if (!empty($errors)) {
                                    foreach ($errors as $error) {
                                        echo 'Ошибка ' . $error . '<br>';
                                    }
                                }

                                ?>

                                <form method="post">
                                    <input type="text" name="username" value="<? if(isset($name)) echo $name; ?>" placeholder="Имя">
                                    <input type="text" name="usermail" value="<? if(isset($mail)) echo $mail;?>" placeholder="Мыло">
                                    <input type="text" name="userpassword" value="<? if(isset($password)) echo $password; ?>"
                                           placeholder="password">
                                    <button type="submit" name="subm" value="sendme">Зарегистироваться</button>

                                </form>
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