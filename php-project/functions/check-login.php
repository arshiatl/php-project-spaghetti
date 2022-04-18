<?php

/*
|----------------------------------------------------------|
|<-----Come and check if my user has logged in or not -----|
|----------------------------------------------------------|
*/

//need session
session_start();

//If the user had not logged in
//If such a session had not been set before
if (!isset($_SESSION['user'])){

    //If such a session had not been set before
    //redirect user
    redirect('auth/login.php');
}