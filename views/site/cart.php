<?
require_once ROOT . '/views/include/header.php';
?>
<? adump($_SESSION); ?>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-912 padding-right">
                    <div class="product-details"><!--product-details-->
                        <h1>Корзина</h1>

                        <?
                        adump($cart);
                        foreach ($cart as $value) {
                            ?>

                            <h1><?= $value['name'] ?></h1>
                            <a href="cart/remove/<?= $value['id'] ?>">Удалить (1 штуку)</a>
                            <a class="remove-from-cart" data-id="<?= $value['id'] ?>">Удалить аяксом (1 штуку)</a>
                            <?
                        }
                        ?>
                        <br/><br/><br/>
                        <a href="/cart/checkout">Оформить </a>
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