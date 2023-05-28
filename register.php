<?php



// ini_set('display_errors', 1);
// error_reporting(E_ALL);
session_start();


createUser(generatedUserId());

if(isset($_SESSION['userId'])){
    header(
        'Location:http://localhost/php_projects/Library_Management_System/home/home.php'
    );
}


function generatedUserId(){
    $url = "https://schoollibray.000webhostapp.com/api/user/read.php";
    $users = json_decode(file_get_contents($url));
    $year = date('Y');
    $id = $year . randomNumber();

    foreach($users as $user){
        if($id==$user->id){
            generatedUserId();
        }else{
            $_SESSION['userId']= $id;
            return $id;
        }
    }
}

function randomNumber(){
    $min = 100000;
    $max = 999999;

    return mt_rand($min,$max);
}


function createUser($id){
    try{
        // API endpoint URL
        $url = 'https://schoollibray.000webhostapp.com/api/user/createUser.php';

        // Initialize curl
        $ch = curl_init();

        $first_name = htmlspecialchars(strip_tags($_POST['first']));
        $last_name = htmlspecialchars(strip_tags($_POST['last']));
        $password = hashedPass($_POST['password']);
        $email = htmlspecialchars(strip_tags($_POST['email']));
        
        $data=array(
            "id"=>$id,
            "first_name"=>$first_name,
            "last_name"=>$last_name,
            "email"=>$email,
            "password"=>$password,
            "role"=>"student"
        );

        // Set curl options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);


        // Execute curl and get response
        $response = curl_exec($ch);

        
        // Close curl
        curl_close($ch);


        }catch(PDOException $e){
            echo $e->getMessage();
        }
}

function hashedPass($password){
    $pass = password_hash($password,PASSWORD_BCRYPT);
    return $pass;
}
?>