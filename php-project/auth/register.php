<?php
//call helper functions
require_once '../functions/helpers.php';

//PDO connection to data
require_once '../functions/pdo_connection.php';

/*
|-----------------------------------------------------------------|
|<---------------------register operation------------------------>|         //insert users in database
|-----------------------------------------------------------------|
*/


//<----------------------validation------------------------------->

                    //errors
$error = '';

//checking condition            **<---isset--->**
if (
//user should send me  email ---> DON'T accept empty email
isset($_POST['email']) && $_POST['email'] !== ''

&&
//user should send me first_name ---> DON'T accept empty first_name
isset($_POST['first_name']) && $_POST['first_name'] !== ''

&&
//user should send me a last_name ---> DON'T accept empty last_name
isset($_POST['last_name']) && $_POST['last_name'] !== ''

&&
//user should send me password ---> DON'T accept empty password
isset($_POST['password']) && $_POST['password'] !== ''

&&
//user should send me confirm password ---> DON'T accept empty confirm password
isset($_POST['confirm']) && $_POST['confirm'] !== ''){

    //We have to go through several filters...

    //<------(1)----->** /first filter is confirm password should be same with the password ** if they were Different We should not let the user do the work
    if ($_POST['password'] === $_POST['confirm']){

     //Is the password that entered for me more than five characters? OR NOT ???
        if (strlen($_POST['password']) > 5){

         //If the user enters a duplicate email, he/she should not be able to register on the site
           //OK then --> How do I know if my user has entered a duplicate email? with SELECT
            //I can put a SELECT on that email that my user enters it , in my database ---> I also have a user with this email OR NOT ?! if I didn't have then allow

            global $connection;

            //find records
            $query = "SELECT * FROM `users` WHERE `email` = ?";


//prepare query
            $statement = $connection->prepare($query);

//GO or execute    <--GO AND find-->
            $statement->execute([$_POST['email']]);

//go and take out the emails from database and bring it back AND put it into $users
            $user = $statement->fetch();

            //if it was false MEAN it can continue ---> then mean There is no such user * then can creat * !
            if ($user === false){

                //then we understand the email is not duplicate -----> user can INSERT in website

                //insert records into database
                global $connection;
                $query = "INSERT INTO `users` SET `email` = ?, `first_name` = ?, `last_name` = ?, `password` = ?, `created_at` = now();";

                //prepare query
                $statement = $connection->prepare($query);

                //GO or execute AND filed the values
                //hash the password ----------------------------> algorithm php default
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                                                    //save the hash password in my database $password
                $statement->execute([$_POST['email'], $_POST['first_name'], $_POST['last_name'], $password]);

//WHEN records added to database return user to login.php

                redirect('auth/login.php');

            } else{
                //Such a user already exists ------------->ERROR<--------------

                $error = 'The email entered is duplicate';
            }

        } else{

            $error = 'Password must be at least five characters long';

        }

    } else{

        $error = 'The password does not match the password confirmation';
    }

} else {
//if user click on login button ---> | show this blow message

//!empty $_POST means user click on login button
    if (!empty($_POST)) {
        //if user doesn't field email AND password
        $error = 'All field must be filled';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css')?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css')?>" media="all" type="text/css">
</head>

<body>
<section id="app">

    <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
        <section style="width: 20rem;">
            <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">PHP Tutorial login</h1>
            <section class="bg-light my-0 px-2">
                <small class="text-danger">
                    <!--show errors when we have errors-->

                    <?php if ($error !== '') echo $error;?>

                </small>
            </section>
            <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="<?= url('auth/register.php')?>" method="post">
                <section class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                </section>
                <section class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name ...">
                </section>
                <section class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name ...">
                </section>
                <section class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
                </section>
                <section class="form-group">
                    <label for="confirm">Confirm</label>
                    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm ...">
                </section>

                <section class="mt-4 mb-2 d-flex justify-content-between">
                    <input type="submit" class="btn btn-success btn-sm" value="register">
<!--                    <a class="" href="">home</a>-->
                    <a class="" href="<?= url('auth/login.php')?>">login</a>

                </section>
            </form>
        </section>
    </section>

</section>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>
