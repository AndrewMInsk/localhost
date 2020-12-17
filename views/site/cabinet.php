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
    <class="r1ow">
    <h2>ЛК </h2>
    <? if (isset($userName)&&$userName): ?>
    <h2>Привет
        <? echo $userName; ?>
    </h2>
   <? endif;?>
    <? if (isset($userId) && $userId): ?>
        <li><a href="/user/history"><i class="fa fa-user"></i> История покупок</a></li>
        <li><a href="/user/edit"><i class="fa fa-lock"></i> Редактировать</a></li>
        <li><a href="/user/logout"><i class="fa fa-lock"></i> Выйти </a></li>
    <? else: ?>
        Тут закрыто, <a href="/user/login">залогиньтесь</a>
    <? endif ?>
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