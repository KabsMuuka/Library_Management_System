<?php
session_start();
include_once 'uploads.php';

// Check if a delete request has been made
if (isset($_POST['delete'])) {
    $file_to_delete = $_POST['file_to_delete'];
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
        header('Location: admin.php');
        exit;
    }
}
// Get a list of uploaded files
$uploaded_files = glob('uploads/*.{jpg,png,gif,pdf}', GLOB_BRACE);
?>
<!DOCTYPE html>
<html> 
    <head>
         <link rel="stylesheet" href="css.css">
    </head>
    <body>
    <a class="profile" href="profile.php" > <img class="img" src="imgs/0.webp" alt=""> </a>
    <hr>
    <div> 
        <h1 class="header"> Admin panel  </h1>

        <p style="text-align: center;">A list of Uploaded files</p>

        <div class="container"> 
              <?php foreach ($uploaded_files as $file): ?>
            <div>
                <img class="uploaded_files" src="<?php echo $file; ?>" alt="">
                <a href="uploads/<?php echo $file;?>"> Download file </a>

                <form action="" method="POST">
                    <input type="hidden" name="file_to_delete" value="<?php echo $file; ?>">
                    <input class="delete_button" type="submit" value="Delete" name="delete">
                </form>
            </div>
              <?php endforeach; ?>
        </div>
        <hr>
        <div> 
        <h1 class="footer">Footer</h1>
        <form action="uploads.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" name="upload">
        </form>
        </div>
    </div>
    
    </body>
</html>
