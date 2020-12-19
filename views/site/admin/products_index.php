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
                    <a href="/admin/products/create/">Добавить товар</a><br>

                </div><!--/product-details-->
                <div class="col-sm-12 padding-right">
                    <table class="table">
                        <tr>
                            <td>Название</td>
                            <td>Цена</td>
                            <td>Редактировать</td>
                            <td>Удалить</td>

                        </tr>
                    <? foreach ($productsList as $product): ?>
                        <tr>
                            <td><?=$product['name']?></td>
                            <td><?=$product['price']?></td>
                            <td><a href="/admin/products/edit/<?=$product['id']?>">Редактировать</td>
                            <td><a href="/admin/products/delete/<?=$product['id']?>">Удалить</td>


                        </tr>

                    <? endforeach; ?>
                    </table>
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