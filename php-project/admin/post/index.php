<?php
//call helper functions
require_once '../../functions/helpers.php';

//PDO connection to data
require_once '../../functions/pdo_connection.php';

//cal function check login ---> Come and check if my user has logged in or not
require_once '../../functions/check-login.php';
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

                <section class="mb-2 d-flex justify-content-between align-items-center">
                    <h2 class="h4">Articles</h2>
                    <a href="<?= url('admin/post/create.php'); ?>" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>title</th>
                            <th><!--cat_id>--> category name</th>
                            <th>body</th>
                            <th>status</th>
                            <th>setting</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        global $connection;

                        //left join needed
                                    //<---------------------->
                        //`post`.* mean I need all that information from post table
                        $query = "SELECT `posts`.*, `categories`.`name` AS category_name FROM `posts` LEFT JOIN `categories` ON `posts`.`cat_id` = `categories`.`id`";

                        //for sql injection <---make prepare--->
                        $statement = $connection->prepare($query);

                        //GO or execute
                        $statement->execute();

                        //get my all records from database
                        $posts = $statement->fetchAll();

                        //show my posts records into table row
                        foreach ($posts as $post){

                        ?>

                            <tr>
                                <!--show post id-->
                                <td><?= $post->id ?></td>

                                <td>
                                    <img style="width: 120px"; height="100px" src="<?= asset($post->img) ?>">
                                </td>

                                <!--show post title-->
                                <td><?= $post->title ?></td>

                                <!--show post cat_id-->
                                <td><?= $post->category_name ?></td>

                                <!--show post body-->
                                <td><?= substr($post->body, 0, 30) . ' ...';  ?></td>

                                <td>
                                    <!--if status == 1 enable-->

                                    <?php if($post->status == 1){ ?>

                                    <span class="text-success">enable</span>

                                    <?php } else{?>

                                    <!--else status != 1 disable-->

                                    <span class="text-danger">disable</span>

                                    <?php } ?>

                                </td>
                                <td>
                                    <a href="<?= url('admin/post/change-status.php?post_id=' . $post->id) ?>" class="btn btn-warning btn-sm col-md-12">Change status</a>
                                    <a href="<?= url('admin/post/edit.php?post_id=' . $post->id) ?>" class="btn btn-info btn-sm col-md-12">Edit</a>
                                    <a href="<?= url('admin/post/delete.php?post_id=' . $post->id) ?>" class="btn btn-danger btn-sm col-md-12">Delete</a>
                                </td>
                            </tr>

                        <?php

                        }

                        ?>

                        </tbody>
                    </table>
                </section>


            </section>
        </section>
    </section>





</section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
