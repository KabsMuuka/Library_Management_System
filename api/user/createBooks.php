<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once('./../config/Database.php');
    include_once('./../models/All.php');


    $database = new Database();
    $userdb=$database->connect();

    $user = new All($userdb);
    $data=json_decode(file_get_contents('php://input'));

    $user->book_name=$data->book_name; 
    $user->author=$data->author; 
    $user->year_published=$data->year_published; 
    $user->description=$data->description;
    $user->img_url=$data->img_url; 
    $user->book_url=$data->book_url;

    if($user->createBook()){
        echo json_encode(
            array(
                'Message'=>'Created succesfully'
            )
            );
    }
    else{
        echo json_encode(
            array(
                'Message'=>'Not Created succesfully'
            )
            ); 
    }

?>