<!--call helper functions-->
<?php
require_once '../functions/helpers.php';

//Read the admin panel codes before you come
//Check first -> See if the user session is set or not
//I mean, see if my user has logged in or not
//If logged in, show it the admin panel --> And let her/him continue the operation

//---------------------> * <-------------------------

//cal function check login ---> Come and check if my user has logged in or not
require_once '../functions/check-login.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css');?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css');?>" media="all" type="text/css">
</head>
<body>
<section id="app">

<!-- top-nav -->
<?php
require_once 'layouts/top-nav.php';
?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">

                <!-- sidebar -->
                <?php
                    require_once 'layouts/sidebar.php';
                ?>

            </section>
            <section class="col-md-10 pb-3">

                <section style="min-height: 80vh;" class="d-flex justify-content-center align-items-center">
                    <section>
                        <h1>PHP Tutorial</h1>
                        <ul class="mt-2 li">
                            <li><h3>PDO Connection</h3></li>
                            <li><h3>File upload</h3></li>
                            <li><h3>Blog (categories and posts)</h3></li>
                        </ul>
                    </section>
                </section>

            </section>
        </section>
    </section>


</section>

<script src="<?= asset('assets/js/jquery.min.js');?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>