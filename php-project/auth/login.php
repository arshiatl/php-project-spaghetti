<?php

//need session 4 login
session_start();

//call helper functions
require_once '../functions/helpers.php';

//PDO connection to data
require_once '../functions/pdo_connection.php';


/*
|-----------------------------------------------------------------|
|<---------------------login operation--------------------------->|
|-----------------------------------------------------------------|
*/



//it's mean if user is login AND also come to login page ---> means user wants to log in again ---> and system should log out user
if (isset($_SESSION['user'])){

    //log out user
    unset($_SESSION['user']);
}

        //errors
$error = '';

//checking condition            **<---isset--->**

if (
//user should send me  email ---> DON'T accept empty email
isset($_POST['email']) && $_POST['email'] !== ''

&&
//user should send me password ---> DON'T accept empty password
isset($_POST['password']) && $_POST['password'] !== ''){

    global $connection;

//find records
$query = "SELECT * FROM `users` WHERE `email` = ?";

//prepare query
$statement = $connection->prepare($query);

//GO or execute    <--GO AND find-->
$statement->execute([$_POST['email']]);

//go and take out the emails from database and bring it back AND put it into $users
$user = $statement->fetch();

//if it wasn't empty ----> means email was in database ---> user insert the correct email
if ($user !== false){

    //system understand email entered correctly

    //now system should check up on password

//step 1    //password_verify will hash that password user entered in login php page AND  Compares it with that hash password in database
//step 2   //If these two were based on an algorithm Understands that the password has been entered correctly

    //compare that password user entered in input VS  password in database
    if (password_verify($_POST['password'], $user->password)){

        //The user has entered both the email and the password correctly
        //now should log in
        $_SESSION['user'] = $user->email;

        //redirect to admin
        redirect('admin');

} else{

        //if password was wrong | show this message
        $error = 'The password or email entered is incorrect';
    }

} else{

    //mean insert the wrong email
    $error = 'The password or email entered is incorrect';

}

} else {
    //if user click on login button ---> | show this blow message

    //!empty $_POST means user click on login button
    if (!empty($_POST)) {
        //if user doesn't field email AND password
        $error = 'All fields must be completed';

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
                    <?php if ($error != '') echo $error; ?>

                </small>
            </section>
            <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="" method="post">
                <section class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                </section>
                <section class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
                </section>
                <section class="mt-4 mb-2 d-flex justify-content-between">
                    <input type="submit" class="btn btn-success btn-sm" value="login">
                    <a class="" href="<?= url('auth/register.php')?>">register</a>
                </section>
            </form>
        </section>
    </section>

</section>


<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>