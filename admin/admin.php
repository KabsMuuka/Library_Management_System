<?php

session_start();

if(!(isset($_SESSION['userid']))){
    header(
        'Location:http://localhost/php_projects/Library_Management_System/index.php'
    );
}

?>
<!DOCTYPE html>
<html> 
    <head>
         <link rel="stylesheet" href="./style.css">
         <script src="./app.js" defer></script>
     
    </head>
    <body>
    <div> 
        </div>
    </div>

    <header>
            <div class="menu">
                <div class="nav">
                    <h1 class="nav-title">Library Management System</h1>
                    <button class="btn-profile">
                        <div class="profile-img">
                            <img class=''src="img/0.webp" alt="profile">
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
                <form action="uploads.php" class="form" method="POST" enctype="multipart/form-data" >
                    <input class="bookName" name="book_name" type="text"  placeholder="Book Name" required>
                    <input class="author" name="author" type="text"  placeholder="Author" required>
                    <input class="year" name="year_published"  type="date" required>
                    <textarea class="description" name="description"  placeholder="Description" required></textarea>
                    <label for="image-file" required>Cover Image</label>
                    <input type="file"  name="image-file" id="image-file" required>
                    <label for="book-file">Book</label>
                    <input type="file"  name="book-file" id="book-file" required>
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
                                            $url='https://schoollibray.000webhostapp.com/api/user/readBooks.php';
                                            
                                            $json = json_decode(file_get_contents($url));
                                            $user_data = $json;
                                            $count = 1;
                                            
                                        foreach ($user_data as $user): ?>
                                            <tr class="tbody">
                                                <td class="bk_data"><?php echo $count?></td>
                                                <td><?php echo $user->book_name?></td>
                                                <td><?php echo $user->author?></td>
                                                <td><?php echo $user->year_published?></td>
                                                <td><?php echo $user->dCount?></td>
                                                <td><?php echo $user->description?></td>
                                                <td><a class="edit">Edit<p class="book_id" style="visibility: hidden;"><?php echo $user->id ?></p></a></td>
                                                <td><a href="./delete.php?id=<?php echo $user->id?>" class="delete">Delete</a></td>
                                            </tr>
                                            
                                            <?php $count++ ?>
                                        <?php endforeach; ?>
                                       
                            </tbody>
                            
                        </table>                        
                    </div>
        </div>
    </main>
    <footer>
            
    </footer>
    
    </body>
</html>
