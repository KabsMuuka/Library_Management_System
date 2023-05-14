<?php
// session_start();
// include_once 'uploads.php';

// // Check if a delete request has been made
// if (isset($_POST['delete'])) {
//     $file_to_delete = $_POST['file_to_delete'];
//     if (file_exists($file_to_delete)) {
//         unlink($file_to_delete);
//         header('Location: admin.php');
//         exit;
//     }
// }
// // Get a list of uploaded files
// $uploaded_files = glob('uploads/*.{jpg,png,gif,pdf}', GLOB_BRACE);
// ?>
<!DOCTYPE html>
<html> 
    <head>
         <link rel="stylesheet" href="admin/style.css">
         <script src="./app.js" defer></script>
    </head>
    <body>
    <!-- <a class="profile" href="profile.php" > <img class="img" src="imgs/0.webp" alt=""> </a> -->
    <!-- <hr> -->
    <div> 
        <!-- <h1 class="header"> Admin panel  </h1>

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
        </form> -->
        </div>
    </div>


    <header>
            <div class="menu">
                <div class="nav">
                    <h1 class="nav-title">Library Management System</h1>
                    <button class="btn-profile">
                        <div class="profile-img">
                            <img class=''src="admin/imgs/0.webp" alt="profile">
                        </div>
                    </button>
                </div>
            </div>
    </header>    
    <main>
        <div class="addBookCard">
            <div class="addBook">
                <div class="card-top">
                    <h3 class="title">Add New Book</h3>
                    <button class="btn-cancel"><h3 class="minimise">X</h3></button>
                </div>
                <form action="admin/uploads.php" class="form" method="POST" enctype="multipart/form-data" >
                    <input class="bookName" name="book_name" type="text"  placeholder="Book Name">
                    <input class="author" name="author" type="text"  placeholder="Author">
                    <input class="year" name="year_published"  type="date">
                    <textarea class="description" name="description"  placeholder="Description"></textarea>
                    <label for="image-file">Cover Image</label>
                    <input type="file"  name="image-file" id="file">
                    <label for="book-file">Book</label>
                    <input type="file"  name="book-file" id="file">
                    <button class="add"type="submit" name="add">Add</button>
                </form>
            </div>
        </div>
        
        <button id="book-btn" class="book-btn">Add Book</button>
        <div class="views">
                    <div class="books">
                        <table>
                            <thead>
                                    <tr class="theader">
                                        <th>ID</th>
                                        <th style="width: 200px;">Book Name</th>
                                        <th style="width: 150px;">Author</th>
                                        <th style="width:130px;">Year Published</th>
                                        <th style="width:100px;">Downloads</th>
                                        <th style="width: 550px;">Description</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                           
                            <tbody>
                                        
                                        <?php 
                                            $url='http://localhost/php_projects/Library_Management_System/api/user/readBooks.php';
                                            
                                            $json = json_decode(file_get_contents($url));
                                            $user_data = $json->data;
                                        foreach ($user_data as $user): ?>
                                            <tr class="tbody">
                                                <td class="bk_data"><?php echo $user->id?></td>
                                                <td><?php echo $user->book_name?></td>
                                                <td><?php echo $user->author?></td>
                                                <td><?php echo $user->year_published?></td>
                                                <td><?php echo $user->dCount?></td>
                                                <td><?php echo $user->description?></td>
                                                <td><button class="edit">Edit</button></td>
                                                <td><button class="delete">Delete</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                   
                            </tbody>
                            
                        </table>                        
                    </div>
        </div>

    </main>
    <footer>
            <p>made with &#10084;&#65039; by Group 7</p>
            <p>&copy; All rights Reserved</p>
    </footer>
    
    </body>
</html>
