<?php

Router::layout('_main', function (){
    Router::get('', fn () => View::render('index/home', ['pageTitle' => 'Anasayfa']));
    Router::get('hakkimizda', fn () => View::render('index/about', "Hakkımızda"));
    Router::get('iletisim', fn () => View::render('index/contact', "İletişim"));
    Router::get('berat', fn () => View::render('index/beratogrenmekistiyor', ">Beberat"));

});




















