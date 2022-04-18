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

//if it wasn't false (TRUE) ---> I MEAN this post exists <---||||--> now can change the status
    if ($post !== false){

        //how to change status !? <---||||||---> answer => I need to get the old status...
                                //short code if -> else
                    //== 1 mean active ---> then if it was active put it for me 0 change it
                    //else if it wasn't 1 -----> put it 1 for ME!
        // 1 = enable <------------------------------------------> 0 = disable
        $status = ($post->status == 1) ? 0 : 1;

        /*
        if ($post->status === 1){
            $status = 0;
        } else{
            $status = 1;
        }
        */

        //query
        $query = "UPDATE `posts` SET `status` = ? WHERE `id` = ?;";

        //prepare query
        $statement = $connection->prepare($query);

        //GO or execute AND update status...
        $statement->execute([$status, $_GET['post_id']]);

    }

}


//after all redirect user back into post
redirect('admin/post');

