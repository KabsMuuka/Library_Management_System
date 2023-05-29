<?php
session_start();

if(!isset($_SESSION['userid'])){
   header(
    'Location:http://localhost/php_projects/Library_Management_System/index.php'
   );
}else{
    $url = "https://schoollibray.000webhostapp.com/api/user/read.php";
    $users = json_decode(file_get_contents($url));

    foreach($users as $user){
        if($_SESSION['userid']==$user->id){
            $firstname = $user->first_name;
            $lastname = $user->last_name;
            $id = $user->id;
            $role = $user->role;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $firstname?></title>
    <link rel="stylesheet" href="./css/profile.css">
</head>
<body>
        <div class="profile">
            <p>First Name: <?php echo $firstname?></p>
            <p>Last Name: <?php echo $lastname?></p>
            <p>User ID: <?php echo $id?></p>
            <p>User Role: <?php echo $role?></p>
            <a href="./home.php">Home</a>
        </div>
</body>
</html>