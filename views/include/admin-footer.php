<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script>




$('.add-to-cart').click(function (e){
e.preventDefault();
console.log(1);

    $.ajax({
        type: "POST", // метод HTTP, используемый для запроса
        url: "/cart/addAjax/"+$(this).data('id'), // строка, содержащая URL адрес, на который отправляется запрос
        data: "", // данные, которые будут отправлены на сервер
        success: function (data) {
            $('#counter').html(data);
        },

        dataType: "html" // тип данных, который вы ожидаете получить от сервера
    });

});


$('.remove-from-cart').click(function (e){
    e.preventDefault();
    console.log(1);

    $.ajax({
        type: "POST", // метод HTTP, используемый для запроса
        url: "/cart/removeAjax/"+$(this).data('id'), // строка, содержащая URL адрес, на который отправляется запрос
        data: "", // данные, которые будут отправлены на сервер
        success: function (data) {
            $('#counter').html(data);
        },

        dataType: "html" // тип данных, который вы ожидаете получить от сервера
    });

});

</script>
</body>
</html>