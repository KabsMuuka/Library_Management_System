<html>  
    <body>
        <a href="admin.php"> < Back </a>'
    </body>
</html>
<?php
    //Displays errors
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST['add'])){
        $allowed_book_ext=array('pdf','pub','doc','ppt','docx','pptx');
        $allowed_image_ext=array('png','jpg','jpeg','tiff','webp');
        if(!empty($_FILES['book-file']['name']) && !empty($_FILES['image-file']['name'])){

            //book properties
            $book_file_name= $_FILES['book-file']['name'];
            $book_file_size= $_FILES['book-file']['size'];
            $book_file_name= $_FILES['book-file']['name'];
            $book_file_tmp= $_FILES['book-file']['tmp_name'];
            $book_target_dir = 'uploads/books/'.$book_file_name;
            $book_file_ext = strtolower(end(explode('.',$book_file_name)));

            
            //cover image properties
            $image_file_name= $_FILES['image-file']['name'];
            $image_file_size= $_FILES['image-file']['size'];
            $image_file_name= $_FILES['image-file']['name'];
            $image_file_tmp= $_FILES['image-file']['tmp_name'];
            $image_target_dir = 'uploads/images/' . $image_file_name;
            $image_file_ext = strtolower(end(explode('.',$image_file_name)));
            if(in_array($book_file_ext,$allowed_book_ext) && in_array($image_file_ext,$allowed_image_ext)){
                if($book_file_size<=50000000 && $image_file_size<=1000000){
                    if(move_uploaded_file($book_file_tmp,$book_target_dir) && move_uploaded_file($image_file_tmp,$image_target_dir)){
                        echo "<p style=color:green;>Book Uploaded</p>";
                    }
                }else{
                    echo "<p style=color:red;>The file is more than 50MB</p>";
                }
            }else{
                echo "<p style=color:red;>The file extension is invalid, only pdf,pub,doc,docx,odt, ppt, pptx are allowed</p>";
            }
            $book_name = $_POST['book_name'];
            $author=$_POST['author'];
            $year_published = date('Y-m-d', strtotime($_POST['year_published']));
            $description = $_POST['description'];

            //data to send to an api
            

            try{
                    // API endpoint URL
                    $url = 'https://schoollibray.000webhostapp.com/api/user/createBooks.php';

                    // Initialize curl
                    $ch = curl_init();

                    $data=array(
                        "book_name"=>$book_name,
                        'author'=>$author,
                        "year_published"=>$year_published,
                        "description"=>$description,
                        "img_url"=>$image_target_dir,
                        "url"=>$book_target_dir
                    );

                    // Set curl options
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    // Execute curl and get response
                    $response = curl_exec($ch);

                    // Close curl
                    curl_close($ch);

                    // Do something with the response
                    echo $response;
                    echo "Book added!";

            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }else{
            echo "<p style=color:red;>Add file</p>";
        }
    }
    
// $target_dir = 'Library_Management_System/admin/uploads';
// $target_file = $target_dir . basename($_FILES["file"]["name"]);
// $uploadOk = 1;
// $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["file"]["size"] > 1000000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// // Allow certain file formats
// if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
// && $FileType != "gif" && $FileType != "pdf") {
//     echo "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
//     $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//         echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//         echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has not been uploaded.";
//     }
// }
?>
