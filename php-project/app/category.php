<?php

//call helper functions
require_once '../functions/helpers.php';

//PDO connection to data
require_once '../functions/pdo_connection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css');?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css');?>" media="all" type="text/css">
</head>
<body>
<section id="app">

    <!--top nav -->
    <?php require_once "../layouts/top-nav.php"?>

    <section class="container my-5">

        <?php

        $notFound = false;

        //If he had sent it to me --> the cat_id ---> continue with him
        if (isset($_GET['cat_id']) && $_GET['cat_id'] !== ''){


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

        //if it was true ---> show category name 4 ME! means --> If there was a category
        if ($category !== false){

            ?>

        <section class="row">

            <section class="col-12">
                <h1><?= $category->name?></h1>
                <hr>
            </section>
        </section>
        <section class="row">

            <?php   $query = "SELECT * FROM `posts` WHERE `status` = 1 AND `cat_id` = ?;";

            //for sql injection <---make prepare--->
            $statement = $connection->prepare($query);

            //GO or execute
            $statement->execute([$_GET['cat_id']]);

            //get my all records from database
            $posts = $statement->fetchAll();

            //show my posts records index page
            foreach ($posts as $post){

                ?>


            <section class="col-md-4">
                <section class="mb-2 overflow-hidden" style="max-height: 15rem;"><img class="img-fluid" src="<?= $category->img?>" alt=""></section>
                <h2 class="h5 text-truncate"><?= $post->title?></h2>
                <p><?= substr($post->body, 0, 130)?>...</p>
                <p><a class="btn btn-primary" href="<?= url('app/detail.php?post_id=' . $post->id )?>" role="button">View details »</a></p>
            </section>

            <?php
            }

        }else{
                $notFound = true;
            }

        }else{

                //If there was no category
                $notFound = true;
            }
        ?>

        </section>

        <?php

        //mean if notFound was ture ---> You have to be displayed
        // ---> Otherwise this row should not be displayed at all
        if ($notFound){

            ?>
        <section class="row">
            <section class="col-12">
                <h1>Category not found</h1>
            </section>
        </section>

       <?php } ?>

    </section>
</section>

</section>

<script src="<?= asset('assets/js/jquery.min.js');?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>
