<?php

//configuration

define('BASE_URL', 'http://localhost/php-project');

//redirect
function redirect($url){
    header('Location: ' . trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
    exit();
}

//asset
function asset($file){
    return trim(BASE_URL, '/ ') . '/' . trim($file, '/ ');
}

//url
function url($url){
    return trim(BASE_URL, '/ ') . '/' . trim($url, '/ ');
}

//var_dump          <---------------debug--------------->
function dd($var){
    echo '<pre>';
    var_dump($var);
    exit();
}
