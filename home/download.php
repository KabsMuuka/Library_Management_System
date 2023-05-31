<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['bookid'])){
    $id= $_GET['bookid'];

    $filePath = $_GET['filepath'];




    if (file_exists($filePath)) {
        // Set the appropriate headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
    
        readfile($filePath);
        exit;
    } else {
        // File not found, handle the error as desired
        echo 'File not found';
        exit;
    }
    
    
    
    
    
    
    


    generatedDownload($id);

    
    // header(
    //     'Location:http://localhost/php_projects/Library_Management_System/home/book.php?id='.$id
    // );
    }else{
        return;
    }


function generatedDownload($book_id){
    try{
        // API endpoint URL
        $url = 'https://schoollibray.000webhostapp.com/api/user/createDownload.php';

        // Initialize curl
        $ch = curl_init();
        
        $data=array(
            "book_id"=>$book_id,
            "dCount"=>1
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

?>