
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
                    <h2 class="h4">Categories</h2>
                    <a href="<?= url('admin/category/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>setting</th>
                        </tr>
                        </thead>
                        <tbody>

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
                            foreach ($categories as $category){

                        ?>
                        <tr>
                            <!--show category id -->
                            <td><?= $category->id ?></td>
                                                        <!--get from database-->
                            <!--show category name -->
                            <td><?= $category->name ?></td>
                            <td>
                                <a href="<?= url('admin/category/edit.php?cat_id=') . $category->id; ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="<?= url('admin/category/delete.php?cat_id=') . $category->id; ?>" class="btn btn-danger btn-sm">Delete</a>
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