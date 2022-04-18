<?php

//need session for log out
session_start();

//call helper functions
require_once '../functions/helpers.php';



//need to destroy session 4 log out
session_destroy();

//when system destroy user session (log out) ----> log out user to login.php
redirect('auth/login.php');

/*
|-----------------------------------------------------------------|
|<---------------------logout operation-------------------------->|
|-----------------------------------------------------------------|
*/

//*******-------->You are not allowed if you did not log in --> Access the admin panel
//first you need to be log in to Access the admin panel