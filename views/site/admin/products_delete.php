<?
require_once ROOT . '/views/include/admin-header.php';
?>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-912 padding-right">
                    <div class="product-details"><!--product-details-->
                        <a href="/admin/products/">управление товарами</a><br>

                    </div>

                </div><!--/product-details-->
                <div class="col-sm-12 padding-right">

                    Реально удалить товар с именем  <?= $product['name'] ?>?
                    <form action="" method="post">
                        <input type="submit" name="submit" value="Удалить">
                    </form>


                </div>
            </div>
        </div>
        </div>
    </section>


    <br/>
    <br/>

<?
require_once ROOT . '/views/include/admin-footer.php';
?>