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
        <!-- Example row of columns -->
        <section class="row">
            <section class="col-md-12">

                    <?php

            global $connection;

            //show all posts from database, in detail.php page

                    //INNER join needed
                    //<---------------------->
                    //`post`.* mean I need all that information from post table

                                            //show enable posts
            $query = "SELECT `posts`.*, `categories`.`name` AS category_name FROM `posts` INNER JOIN `categories` ON `posts`.`cat_id` = `categories`.`id` WHERE `posts`.`status` = 1 AND `posts`.`id` = ?;";

            //for sql injection <---make prepare--->
            $statement = $connection->prepare($query);

            //GO or execute
            $statement->execute([$_GET['post_id']]);

            //get my all records from database
            $post = $statement->fetch();

            //If system did not find the post ---------> show = post not found!
                    if ($post !== false){
                        //mean post found
                ?>

                <h1><?= $post->title ?></h1>
                <h5 class="d-flex justify-content-between align-items-center">
                    <a href="<?= url('app/category.php?cat_id=' . $post->cat_id)?>"><?= $post->category_name?></a>
                    <span class="date-time"><?= $post->created_at?></span>
                </h5>
                <article class="bg-article p-3">
                    <img class="float-right mb-2 ml-2" style="width: 18rem;" src="<?= asset($post->img)?>" alt="">
                    <?= $post->body?>
                </article>

                <?php } else{ ?>

                <section>post not found!</section>

               <?php } ?>

            </section>
        </section>
    </section>

</section>

<script src="<?= asset('assets/js/jquery.min.js');?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>
