<?
require_once ROOT . '/views/include/header.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">
                        <?echo $news['h1']?>
                        </h2>

                        <?echo $news['content']?>


                    </div><!--features_items-->



                </div>
            </div>
        </div>
    </section>

<?php

require_once ROOT . '/views/include/footer.php';