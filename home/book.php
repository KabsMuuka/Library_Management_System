<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="./home.php"><p>G<span>7</span></p></a>
            </div>
            <div class="nav-elements">
                <ul>
                    <li><a class="home" href="././home.php">Home</a></li>
                    <!-- <li><a class="featured" href="">Featured</a></li>
                    <li><a class="trending" href="">Trending</a></li> -->
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="book-week">
            <a href="">
                <p class="hero">Book of the Week</p>
            </a>
            <?php

            $bookId = $_GET['id'];
            $url='https://schoollibray.000webhostapp.com/api/user/readBooks.php';                       
            $json = json_decode(file_get_contents($url));
            $user_data = $json;

            foreach($user_data as $user){
                if($user->id==$bookId){
                    $book_name = $user->book_name;
                    $author = $user->author;
                    $description = $user->description;
                    $download = $user->url;
                    $year = substr($user->year_published, 0,4);
                    $img_url = $user->img_url;
                    
           
                    $url = "";
                    if($user->img_url==""){
                        $url = './images/b19.jpg';
                    }else if(is_null($user->img_url)){
                            $url = './images/b19.jpg';
                    }
                    else{            
                        $url = '../admin/'.$user->img_url;
                        if(!getimagesize($url)){
                            $url = './images/b19.jpg';
                        }
                    }
                }
            }         
            ?>
                
                
              
        </div>

        <div class="all-books">
                <div class="single-book-card">
                    <img src="<?php echo $url?>" alt="">
                    <div class="dits">
                        <p class="book-name"><?php echo $book_name?></p>
                        <p class="author"><?php echo $author?></p>
                        <div class="description">
                        <?php echo $description?>
                        </div>
                        <div class="elements">
                            <p class="downloads"><?php echo $year ?></p>
                            
                            <form class="download-form" action="" method="post">
                                <a class="download" href="./download.php?bookId=<?php echo $bookId ?>&file=<?php echo basename($download) ?>">download</a>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <div class="classs">

        </div>
    </main>
    <script src="./book.js"></script>
</body>
</html>