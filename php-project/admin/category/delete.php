<?php

//call helper functions
require_once '../../functions/helpers.php';

//PDO connection to data
require_once '../../functions/pdo_connection.php';

//cal function check login ---> Come and check if my user has logged in or not
require_once '../../functions/check-login.php';

//delete records in database
 if (isset($_GET['cat_id']) && $_GET['cat_id'] !== ''){

     global $connection;

     //delete records from database
     $query = "DELETE FROM `categories` WHERE `id` = ?";

     //prepare query
     $statement = $connection->prepare($query);

     //GO or execute AND delete the records
     $statement->execute([$_GET['cat_id']]);
 }

//WHEN records delete from database return user to category
redirect('admin/category');