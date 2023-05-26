<?php
session_start();
$login = $_POST['login'];

if(isset($login)){
   $user = htmlspecialchars(strip_tags($_POST['userid']));
   $password = $_POST['password'];

    $url = "https://schoollibray.000webhostapp.com/api/user/read.php";
    $users = json_decode(file_get_contents($url));

    foreach($users as $single){
        if($user == $single->id && $password==$single->password){
            echo 'Hello '. $single->id;
            $_SESSION['userid']= $single->id;
            $_SESSION['password']= $single->password;
            header(
                'Location:http://localhost/php_projects/Library_Management_System/home/home.php'
            );
            break;
        }else{
            echo "Wrong password or user";
        }
    }
}



?>