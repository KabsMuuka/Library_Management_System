<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, 
    Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once('./../config/Database.php');
    include_once('./../models/All.php');


    $database = new Database();
    $userdb=$database->connect();

    $user = new All($userdb);
    $data=json_decode(file_get_contents('php://input'));

    $user->book_id=$data->book_id;
    $user->download_count=$data->dCount;


    if($user->createDownload()){
        echo json_encode(
            array('Message'=>'Downloaded!')
        );
    }else{
        echo json_encode(
            array('Message'=>'User not created!')
        );
    }

    ?>