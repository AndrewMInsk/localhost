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
                    <?
                    echo $result.'<br>';
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo 'Ошибка ' . $error . '<br>';
                        }
                    }

                    ?>

                    <form action=""  method="post" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="Имя" value="<?=$name?>">
                        <input type="text" name="price" placeholder="Цена" value="<?=$price?>">
                        <input type="text" name="categoryId" placeholder="Id категории" value="<?=$categoryId?>">
                        <input type="file" name="files" placeholder="Файлик " >

                        <input type="submit" name="submit" value="Добавить">
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