<?
require_once ROOT . '/views/include/header.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">




                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние Новости</h2>


                        <? foreach ($newsList as $key => $item): ?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <p><?= $item['h1'] ?></p>
                                            <a href="/blog/<?= $item['id'] ?>" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>К новости</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <? endforeach; ?>


                    </div><!--features_items-->



                </div>
            </div>
        </div>
    </section>

<?php

require_once ROOT . '/views/include/footer.php';