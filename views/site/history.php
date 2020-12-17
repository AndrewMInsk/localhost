<?
require_once ROOT . '/views/include/header.php';
?>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-12 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="r1ow">
                            <h2>ЛК </h2>
                            <? if (isset($userName) && $userName): ?>
                                <h2>Привет
                                    <? echo $userName; ?>
                                </h2>
                            <? endif; ?>

                            <?
                            foreach ($sales as $sale) {
                                foreach ($sale as $item) {
                                    echo $item['name'];
                                    echo ' ';
                                    echo $item['number'];
                                    echo '<br>';
                                }
                                echo '<br>';
                                echo '<br>';
                                echo '<br>';
                                echo '<br>';
                            }
                            ?>

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