<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once('./../config/Database.php');
include_once('./../models/All.php');


    
    $database = new Database();
    $userdb=$database->connect();

    $user = new All($userdb);
    $result=$user->readBooks();


    $rowCount = $result->rowCount();

    if($rowCount>0){
        $arrayItems=array();
        $arrayItems['data'] = array();

        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            
            $userItems=array(
                'id'=>$id,
                'book_name'=>$book_name,
                'author'=>$author,
                'year_published'=>$year_published,
                'description'=>$description,
                'dCount'=>$dCount,
                'img_url'=>$img_url
            );

            array_push($arrayItems['data'], $userItems);
        }
        echo json_encode($arrayItems);
    }else{
        echo json_encode(
            array(
                'message'=>'No users'
            )
            );
    }
    


?>