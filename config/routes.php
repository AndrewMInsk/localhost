<?php
return array(
    'product/([0-9]+)'=>'product/view/$1',

    'category/([0-9]+)/page-([0-9]+)'=>'catalog/showlist/$1/$2',
    'category/([0-9]+)' => 'catalog/showlist/$1',
    'category'=>'catalog/index',
    'cart/add/([0-9]+)'=>'cart/add/$1',
    'cart/addAjax/([0-9]+)'=>'cart/addAjax/$1',
    'cart/removeAjax/([0-9]+)'=>'cart/removeAjax/$1',
    'cart/remove/([0-9]+)'=>'cart/remove/$1',
    'cart/checkout'=>'cart/checkout/',
    'cart'=>'cart/showme',

    'blog/([0-9]+)'=>'blog/view/$1',
    'blog'=>'blog/index',
    'user/register'=>'user/register',
    'user/login'=>'user/login',
    'user/edit'=>'user/edit',
    'user/history'=>'user/history',
    'user/cabinet'=>'cabinet/index',
    'user/logout'=>'user/logout',
    'contacts'=>'site/contacts',

    '([a-z]+)'=>'notFound/index/$1',
    ''=>'site/index',



);