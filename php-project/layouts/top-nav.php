<?php

//session start
session_start();

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-blue ">

    <a class="navbar-brand " href=" <?= url('admin')?>">PHP tutorial</a>
    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarSupportedContent " aria-controls="navbarSupportedContent " aria-expanded="false " aria-label="Toggle navigation ">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent ">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active ">
                <a class="nav-link " href=" <?= url('app/index.php'); ?>">Home <span class="sr-only ">(current)</span></a>
            </li>

            <?php
            global $connection;

            // for show all categories in top-nav

            $query = "SELECT * FROM `categories`";

            //for sql injection <---make prepare--->
            $statement = $connection->prepare($query);

            //GO or execute
            $statement->execute();

            //get my all records from database
            $categories = $statement->fetchAll();

            //show my categories records into table row
            foreach ($categories as $category){

            ?>

            <li class="nav-item ">
                <a class="nav-link " href="<?= url('app/category.php?cat_id=' . $category->id)?> "> <?= $category->name?></a>
            </li>

            <?php } ?>

        </ul>
    </div>

    <section class="d-inline ">

        <?php

            //That means neither registered nor logged in
            if (!isset($_SESSION['user'])){

        ?>

        <a class="text-decoration-none text-white px-2 " href=" <?= url('auth/register.php')?>">register</a>
        <a class="text-decoration-none text-white " href=" <?= url('auth/login.php')?>">login</a>

        <?php } else

            //that means user is login --->
            if (isset($_SESSION['user'])){

        ?>


        <a class="text-decoration-none text-white px-2 " href="<?= url('auth/logout.php')?> ">logout</a>

        <?php } ?>

    </section>
</nav>
