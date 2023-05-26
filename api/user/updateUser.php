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

    $user->student_id=$data->id;

    $user->first_name=$data->first_name; 
    $user->last_name=$data->last_name; 
    $user->email=$data->email; 
    $user->password=$data->password;
    $user->role=$data->role;  

    if($user->updateUser()){
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