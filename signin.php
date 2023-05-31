<?php
 

$login = $_POST['login'];

if(isset($login)){
   checkStudent();
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
function checkStudent(){
$user = htmlspecialchars(strip_tags($_POST['userid']));
$password = $_POST['password'];

    $url = "https://schoollibray.000webhostapp.com/api/user/read.php";
    $users = json_decode(file_get_contents($url));

    foreach($users as $single){
        if($user == $single->id && password_verify($password, $single->password)){
            session_start();
            $_SESSION['userid']= $single->id;
            $_SESSION['password']= $single->password;

            if(isset($_SESSION['userid'])){
                $role = $single->role;
                $firstname = $single->first_name;
                $lastname = $single -> last_name;

                $_SESSION['firstname']= $firstname;
                $_SESSION['lastname']=$lastname;
                $_SESSION['role']=$role;


                if($role=='student'){
                    header(
                        'Location:http://localhost/php_projects/Library_Management_System/home/home.php'
                    );
                }else if($role=='admin'){
                    header(
                        'Location:http://localhost/php_projects/Library_Management_System/admin/admin.php'
                    );
                }
               
            }
            break;
        }else{
            header(
                'Location:http://localhost/php_projects/Library_Management_System/index.php'
            );
        }
    }
}




?>