<?php
//call helper functions
require_once '../../functions/helpers.php';

//PDO connection to data
require_once '../../functions/pdo_connection.php';

//cal function check login ---> Come and check if my user has logged in or not
require_once '../../functions/check-login.php';


//checking condition            **<---isset--->**
if (
        //user should send me a title ---> DON'T accept empty title
        isset($_POST['title']) && $_POST['title'] !== ''

        &&
        //check cat_id ---> DON'T accept empty category
        isset($_POST['cat_id']) && $_POST['cat_id'] !== ''

        &&
        //user should send me a body ---> DON'T accept empty body <---> name
        isset($_POST['body']) && $_POST['body'] !== ''

        &&
        //user should send me img ---> DON'T accept empty img <---> name
        isset($_FILES['image']) && $_FILES['image']['name'] !== ''){


        //      ***checking category that is sent by user is exists OR not...***



    //                  <-----find category with cat_id----->
    global $connection;

    //find records
    $query = "SELECT * FROM `categories` WHERE `id` = ?";


//prepare query
    $statement = $connection->prepare($query);

//GO or execute    <--GO AND find-->
    $statement->execute([$_POST['cat_id']]);

//go and take out the records from database and bring it back AND put it into $category
    $category = $statement->fetch();



    //check img format 4 upload    ****----*****


    //get chosen file (img) mimes example like = .png .text .jpg... and compare it with $allowedMimes
    $allowedMimes = ['png', 'jpeg', 'jpg', 'gif'];

    //show information of the uploaded file
    $imgMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);  //return only EXTENSION


    //now check $imgMime is inside in $allowedMimes. <------> if it was inside into $allowedMimes it's OK OR allowed <-**-> else it's unallowable


    //if $imgMime wasn't inside into $allowedMimes. <------>  I mean **if wasn't allowed mimes** redirect user to post
    if(!in_array($imgMime, $allowedMimes)){

        //redirect user to post
        redirect('admin/post');
    }

    //now we detected user upload allowed IMG or mimes


        //need to upload IMG into assets file ----> post   ****** we only save IMG address OR link in database

        //need to rich base address in project with __DIR__
        $basePath = dirname(dirname(__DIR__));

                                            //usually put date on IMG name
        $image = '/assets/images/posts/' . date("Y_m_d_h_t_s") . '.' . $imgMime;

        //now we created 0-100 IMG <---->   no we should send this IMG into assets/images/posts/
        $image_upload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);


        //I MEAN the category that user field , exists <------> AND also IMG uploaded correctly
        //if both of them were ture GO ---> execute insert operation *-_-*
        if ($category !== false && $image_upload !== false){

            //query     <--INSERT INTO-->    AND set title, cat_id, body, image and created_at
            $query = "INSERT INTO `posts` SET `title` = ?, `cat_id` = ?, `body` = ?, `img` = ?, `created_at` = now();";

            //prepare query
            $statement = $connection->prepare($query);

            //GO or execute AND insert the records
            $statement->execute([$_POST['title'], $_POST['cat_id'], $_POST['body'], $image]);


    }

    //then send the user back into post
    redirect('admin/post');




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

                                                                                    <!--for img upload-->
                <form action="<?= url('admin/post/create.php')?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">

                            <!--needed to show categories list 4 users-->
                            <?php
                            global $connection;
                            $query = "SELECT * FROM `categories`";

                            //for sql injection <---make prepare--->
                            $statement = $connection->prepare($query);

                            //GO or execute
                            $statement->execute();

                            //get my all records from database
                            $categories = $statement->fetchAll();

                            //show my categories records into table row
                            foreach ($categories as $category){   ?>


                            <!--set 4each on option-->


                        <!--send categories id 4 php into value -->    <!--send categories name 4 user-->
                            <option value="<?= $category->id ?>">  <?= $category->name ?></option>



                            <?php } ?>

                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
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