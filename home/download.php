<?php

if(isset($_POST['submit-btn'])){
    $id= $_POST['book-id'];
    echo $id;
    echo "Hello";
}


function generatedUserId(){
    $url = "https://schoollibray.000webhostapp.com/api/user/read.php";
    $users = json_decode(file_get_contents($url));



}

?>