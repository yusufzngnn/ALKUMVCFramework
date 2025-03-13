<?php

Router::layout('_customcss', function (){
    Router::get('', fn () => View::render('index/home', "ALKUMVC Ana Sayfa"));
});

Router::layout('_main', function (){
    Router::get('bs', fn () => View::render('index/home', "ALKUMVC Ana Sayfa"));
});