<?
require_once ROOT.'/views/include/header.php';
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
                                    <h4 class="panel-title"><a href="/category/<?=$item['id']?>"><?=$item['name']?></a></h4>
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
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?
                                echo $product['image'];
                                ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
<? if ($product['is_new']): ?>

    <img src="images/product-details/new.jpg" class="newarrival" alt="" />

<?endif;?>
                                <h2>

                                    <?
                                    echo $product['name'];
                                    ?>
                                </h2>
                                <p>Код товара: <? echo $product['code'];?></p>
                                <span>
                                            <span><? echo $product['price'];?> руб. </span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                <p><b>Наличие:</b> <? echo $product['availability'];?></p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b><? echo $product['brand'];?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <? echo $product['description'];?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br/>
<br/>

<?
require_once ROOT.'/views/include/footer.php';
?>