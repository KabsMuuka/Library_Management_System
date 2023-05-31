<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('./../config/Database.php');
include_once('./../models/All.php');



    
    $database = new Database();
    $userdb=$database->connect();

    $user = new All($userdb);
    $result=$user->readUser();


    $rowCount = $result->rowCount();

    if($rowCount>0){
        $arrayItems=array();
        $arrayItems['data'] = array();

        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            
            $userItems=array(
                'id'=>$id,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'password'=>$password,
                'role'=>$role
            );

            array_push($arrayItems['data'], $userItems);
        }
        echo json_encode($arrayItems['data']);
    }else{
        echo json_encode(
            array(
                'message'=>'No users'
            )
            );
    }


?>