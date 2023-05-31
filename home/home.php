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
    <title>SLMS|Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="./home.php"><p>G<span>7</span></p></a>
            </div>
            <li class="menu">
                <a class="menu-icon" href="">
                <span class="material-symbols-outlined menu-bar">menu</span>
                </a>
            </li>
            <div class="nav-elements">
                <ul>
                    <li><a class="home" href="./home.php">Home</a></li>
                    <li><a class="featured" href="">Featured</a></li>
                    <li><a href="" class="user-profile1"><?php echo  strtoupper(substr($firstname,0,1)).strtoupper(substr($lastname,0,1))?></a></li>
                    <li><form class="show" id="form"action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="search" name="search" id="search" placeholder="Search">
                        <button type="submit"  name="search_button">S</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="menus hidden">
                <ul>
                    <li><a href="./profile.php">Profile</a></li>
                    <li><a href="./../signout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="book-week">
            <a href="">
                <p class="hero">Book of the Week</p>
            </a>
        </div>

        <div class="books">

            <?php 

                
                // ini_set('display_errors', 1);
                // error_reporting(E_ALL);
                $url='https://schoollibray.000webhostapp.com/api/user/readBooks.php';                       
                $json = json_decode(file_get_contents($url));
                $user_data = $json;

                $books_per_page = 8;
                $total_books = count($user_data);
                $total_pages = ceil($total_books/$books_per_page);
                $current_page = isset($_GET['page'])?$_GET['page']:1;

                $start_index = ($current_page-1)* $books_per_page;
                $end_index = $start_index + $books_per_page;

                $book_page = array_slice($user_data, $start_index, $end_index);?>
                <?php if(isset($_POST['search_button'])):?>
                    <?php foreach ($user_data as $data):?>
                        <?php $pattern = '/'. preg_quote($_POST['search'],'/').'/si';?>
                        <?php if(preg_match($pattern,$data->book_name)||preg_match($pattern,$data->author)||preg_match($pattern,$data->year_published)):?>
                            <a class="book-links" href="<?php echo 'book.php?id='.$data->id ?>">
                                <div class="book-card">
                                <?php
                                $url = "";
                                if($data->img_url==""){
                                    $url = './images/b19.jpg';
                                }elseif(is_null($user->img_url)){
                                    $url = './images/b19.jpg';
                                }
                                else{
                                    $url = '../admin/'.$data->img_url;
                                    if(!getimagesize($url)){
                                        $url = './images/b19.jpg';
                                    }
                                }
                            ?>
                                    <img src="<?php echo $url ?>" alt="Picture">
                                    <p class="book-name"><?php echo $data->book_name ?></p>
                                    <p class="author"><?php echo $data->author ?></p>
                                    <div class="elements">
                                        <?php  if(is_null($data->dCount)){
                                            $data->dCount=0;
                                        } 
                                        ?>
                                        <p class="downloads"><?php echo $user->dCount ?></p>
                                        <p class="star">&Star;</p>
                                    </div>
                                </div>
                            </a>
                        <?php endif ?>
                    <?php endforeach ?>    
                <?php endif ?>
            <?php if(!(isset($_POST['search_button']))): ?>
            
            <?php foreach ($book_page as $user):?>
                    <a class="book-links" href="<?php echo 'book.php?id='.$user->id ?>">
                        <div class="book-card">
                            <?php
                                $url = "";
                                if($user->img_url==""){
                                    $url = './images/b19.jpg';
                                }elseif(is_null($user->img_url)){
                                    $url = './images/b19.jpg';
                                }
                                else{
                                    $url = '../admin/'.$user->img_url;
                                    if(!getimagesize($url)){
                                        $url = './images/b19.jpg';
                                    }
                                }
                            ?>
                            <img id="image" src="<?php echo $url?>" alt="Picture">
                            <p class="book-name"><?php echo $user->book_name ?></p>
                            <p class="author"><?php echo $user->author ?></p>
                            <div class="elements">
                                <?php  if(is_null($user->dCount)){
                                    $user->dCount=0;
                                    
                                } 
                                ?>
                                <p class="downloads">
                                <span class="material-symbols-outlined">
                                        download
                                </span>
                                    <?php echo $user->dCount ?>
                                </p>
                                <p class="star">&Star;</p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif ?>
 
            
        </div>
        <div class="btns">

            <?php 
              
            for($i=1; $i<=$total_pages;$i++){
               echo '<a href="?page='.$i.'">'.$i.'</a>';
            }
            if($current_page<$total_pages){
                echo '<a href="?page='.($current_page+1).'">next</a>';
            }
            if($current_page>1){
                echo '<a href="?page='.($current_page-1).'">prev</a>';
            }
            ?>
        </div>
    </main>
    <footer>
        <div class="footer">
            <p>Copyright &copy; <span class="year">2023</span></p>
        </div>
    </footer>
    <script>
        const image = document.getElementById('image');
        console.lgo(image.innerHTML);
        image.onerror = function() {

            // Error occurred while loading/displaying the image
            image.src = './images/b19.jpg';
        };
    </script>
    <script src="./js/app.js"></script>
</body>
</html>
