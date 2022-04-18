<?php
//call helper functions
require_once '../../functions/helpers.php';

//PDO connection to data
require_once '../../functions/pdo_connection.php';

//cal function check login ---> Come and check if my user has logged in or not
require_once '../../functions/check-login.php';

//create records into database WHEN the name field completed and submit
if(isset($_POST['name']) && $_POST['name'] !== ''){

    //insert records into database
    global $connection;
    $query = "INSERT INTO `categories` SET `name` = ?, `created_at` = now();";

    //prepare query
    $statement = $connection->prepare($query);

    //GO or execute AND filed the values
    $statement->execute([$_POST['name']]);

//WHEN records added to database return user to category
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

                    <form action="<?= url('admin/category/create.php'); ?>" method="post">
                        <section class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
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