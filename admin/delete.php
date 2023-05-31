<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


createUser();

// header(
//     'Location:http://localhost/php_projects/Library_Management_System/admin/admin.php'
// );






function createUser(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    try{

            $url = 'https://schoollibray.000webhostapp.com/api/user/deleteBook.php';

            
            $data=array(
                "id"=>$id
            );


            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
            curl_setopt($ch, CURLOPT_VERBOSE, true);


            $response = curl_exec($ch);

            curl_close($ch);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
}
?>