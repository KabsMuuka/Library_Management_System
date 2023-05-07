<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, 
    Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once('./../config/Database.php');
    include_once('./../models/All.php');


    $database = new Database();
    $userdb=$database->connect();

    $user = new All($userdb);
    $data=json_decode(file_get_contents('php://input'));

    $user->book_id=$data->id;

    $user->book_name=$data->book_name; 
    $user->author=$data->author; 
    $user->year_published=$data->year_published; 
    $user->description=$data->description; 

    if($user->updateBook()){
        echo json_encode(
            array(
                'Message'=>'updated succesfully'
            )
            );
    }
    else{
        echo json_encode(
            array(
                'Message'=>'Not updated'
            )
            ); 
    }
    
    ?>