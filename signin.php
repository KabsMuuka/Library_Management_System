<?php
 
define('ROLE_STUDENT','student');
define('ROLE_ADMIN','admin');

$permissions=[
    ROLE_STUDENT=>[
        'view_books'
    ],
    ROLE_ADMIN=>[
        'view_books',
        'edit_books',
        'add_admin',
        'add_book'
    ]
    ];



$login = $_POST['login'];

if(isset($login)){
   checkStudent();
}

function checkStudent(){
$user = htmlspecialchars(strip_tags($_POST['userid']));
$password = $_POST['password'];

    $url = "https://schoollibray.000webhostapp.com/api/user/read.php";
    $users = json_decode(file_get_contents($url));

    foreach($users as $single){
        if($user == $single->id && $password==$single->password){
            session_start();
            $_SESSION['userid']= $single->id;
            $_SESSION['password']= $single->password;
            if(isset($_SESSION['userid'])){
                header(
                    'Location:http://localhost/php_projects/Library_Management_System/home/home.php'
                );
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