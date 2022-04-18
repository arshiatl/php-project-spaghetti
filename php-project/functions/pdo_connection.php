<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'php_project';

global $connection;

try {
    // set the PDO error mode to exception <-------> set PDO default fetch mode to OBJ
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);

    //set connection
    $connection = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password, $option);
    return $connection;


} catch (PDOException $e){
    echo 'Failed to connect to data base ' . $e->getMessage() . '<br>';
    exit();
}