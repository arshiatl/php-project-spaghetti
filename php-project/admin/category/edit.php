<?php

//call helper functions
require_once '../../functions/helpers.php';

//PDO connection to data
require_once '../../functions/pdo_connection.php';

//cal function check login ---> Come and check if my user has logged in or not
require_once '../../functions/check-login.php';

//if cat_id didn't set AND cat_id didn't send in url <-----redirect user to category----->
if (!isset($_GET['cat_id'])){
    redirect('admin/category');
}

//                  <-----find category with cat_id----->
global $connection;

                    //find records
$query = "SELECT * FROM `categories` WHERE `id` = ?";


//prepare query
$statement = $connection->prepare($query);

//GO or execute    <--GO AND find-->
$statement->execute([$_GET['cat_id']]);

//go and take out the records from database and bring it back AND put it into $category
$category = $statement->fetch();

//if I didn't have this category <--example: user field id = 1000000000 in url--> redirect user to category
if ($_GET['cat_id'] === false){
    redirect('admin/category');
}

                            //<-----Update categories----->

//if name was set AND wasn't empty  <--then go update-->
if (isset($_POST['name']) && $_GET['name'] !== ''){

//query     <--update-->    AND set name an updated_at
$query = "UPDATE `categories` SET `name` = ?, `updated_at` = now() WHERE `id` = ?;";

//prepare query
$statement = $connection->prepare($query);

//GO or execute AND update the records
$statement->execute([$_POST['name'], $_GET['cat_id']]);

//then send the user back into category
redirect('admin/category');

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css')?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css')?>" media="all" type="text/css">
</head>

<body>
<section id="app">

    <!--top-nav-->
    <?php
    require_once '../layouts/top-nav.php';
    ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">

                <!--sidebar-->
                <?php
                require_once '../layouts/sidebar.php';
                ?>

            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('admin/category/edit.php?cat_id=') . $_GET['cat_id']; ?>" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>

                                                                <!--*** the previous value of category***-->
                        <input type="text" class="form-control" name="name" id="name" value="<?= $category->name ?>" ">
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </section>

                </form>

            </section>
        </section>
    </section>

</section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>

