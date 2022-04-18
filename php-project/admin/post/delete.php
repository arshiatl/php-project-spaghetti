<?php
//call helper functions
require_once '../../functions/helpers.php';

//PDO connection to data
require_once '../../functions/pdo_connection.php';

//cal function check login ---> Come and check if my user has logged in or not
require_once '../../functions/check-login.php';


global $connection;

//if user send post_id AND $_GET home ---> post_id wasn't empty <---> user can continue with ME
if(isset($_GET['post_id']) && $_GET['post_id'] !== ''){



    //find records          //****check for exist post_id*****
    $query = "SELECT * FROM `posts` WHERE `id` = ?";


//prepare query
    $statement = $connection->prepare($query);

//GO or execute    <--GO AND find-->
    $statement->execute([$_GET['post_id']]);

//go and take out the records from database and bring it back AND put it into $post
    $post = $statement->fetch();

    /*
     |------------------------------------------------------------------|                                                               |
     | first thing to do delete posts you need to *first* delete IMG... |
     |__________________________________________________________________|
    */

    //base project address <--base path--> GOING to php project....
    $basePath = dirname(dirname(__DIR__));

    //make condition if IMG exists ---> unliked 4 ME !
    if(file_exists($basePath . $post->img)){

        //delete IMG in directory asset/image
        unlink($basePath . $post->img);
    }


    /*
    |------------------------------------------------------|
    |after I delete IMG now it's time to delete the post...|
    |______________________________________________________|
    */



    //delete records from database
    $query = "DELETE FROM `posts` WHERE `id` = ?";

    //prepare query
    $statement = $connection->prepare($query);

    //GO or execute AND delete the records
    $statement->execute([$_GET['post_id']]);
}



//after all redirect user back into post
redirect('admin/post');


