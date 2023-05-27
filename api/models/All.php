<?php

    class All{
        public $student_id;
        public $first_name;
        public $last_name;
        public $email;
        public $password;
        public $download_count;
        public $img_url;
        public $book_name;
        public $book_id;
        public $book_url;
        public $author;
        public $year_published;
        public $date_created;
        public $description;
        public $role;
        private $db;

        function __construct($db){
            $this->db=$db;
        }

        public function readUser(){
            $querry= '
                SELECT
                id,
                password,
                first_name,
                last_name,
                role,
                FROM users
            ';
            $stmt = $this->db->prepare($querry);

            $stmt->execute();

            return $stmt;
        }
        
        public function readBooks(){
            $querry='
            SELECT books_url.id, book_name, author, year_published, description, img_url, url, COUNT(downloads.book_id) AS dCount
            FROM books
            JOIN images ON images.book_id = books.id
            JOIN books_url ON books_url.book_id = books.id
            LEFT JOIN downloads ON downloads.book_id = books.id
            GROUP BY books_url.id, book_name, author, year_published, description, img_url, url;
            ';
            // $querry =
            //         '
            //         select book_name,author,year_published,description,img_url, url from books join images on images.book_id=books.id join books_url on books_url.book_id=books.id
            //         ';
            $stmt=$this->db->prepare($querry);
            $stmt->execute();

            return $stmt;
        }

        public function createBook(){
            $querry = '
                INSERT INTO books
                (book_name,author,year_published,description)
                VALUES(
                    :book_name, 
                    :author, 
                    :year_published, 
                    :description
                )
            ';
            
            $querry2 = '
                    INSERT INTO images
                    (img_url, book_id)
                    VALUES(
                        :image_url,
                        :book_id
                    )
            ';
            $querry1=
                'INSERT INTO books_url
                (url, book_id)
                VALUES(
                    :book_url,
                    :book_id
                )';
            try{
                $stmt = $this->db->prepare($querry);

                $this->book_name=htmlspecialchars(strip_tags($this->book_name));
                $this->author=htmlspecialchars(strip_tags($this->author));
                $this->year_published=htmlspecialchars(strip_tags($this->year_published));
                $this->description=htmlspecialchars(strip_tags($this->description));
                
                $stmt->bindParam(':book_name', $this->book_name);
                $stmt->bindParam(':author', $this->author);
                $stmt->bindParam(':year_published', $this->year_published);
                $stmt->bindParam(':description', $this->description);
                $stmt->execute();
                $lastId=$this->db->lastInsertId();
                //insert image_url 
                $stmt1 = $this->db->prepare($querry2);
                $this->img_url=htmlspecialchars(strip_tags($this->img_url));
                $stmt1->bindParam(':image_url',$this->img_url);
                $stmt1->bindParam(':book_id',$lastId);
                $stmt1->execute();

                //insert book_url
                $stmt2 = $this->db->prepare($querry1);
                $this->book_url=htmlspecialchars(strip_tags($this->book_url));
                $stmt2->bindParam(':book_url',$this->book_url);
                $stmt2->bindParam(':book_id',$lastId);
                $stmt2->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
            
            
        }

        public function updateBook()
        {
            $querry='
                UPDATE books
                SET
                    book_name=:book_name, 
                    author=:author, 
                    year_published=:year_published, 
                    description=:description
                    WHERE id=:id
            ';
            $stmt = $this->db->prepare($querry);

            $this->book_id=htmlspecialchars(strip_tags($this->book_id));
            $this->book_name=htmlspecialchars(strip_tags($this->book_name));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->year_published=htmlspecialchars(strip_tags($this->year_published));
            $this->description=htmlspecialchars(strip_tags($this->description));

            $stmt->bindParam(':book_name', $this->book_name);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':year_published', $this->year_published);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':id', $this->book_id);

            if($stmt->execute()){
                return true;
            }

            return false;
        }
        public function createUser(){
            $querry='
                INSERT INTO users(
                    id,first_name,last_name,email,password,role
                    )
                VALUES(
                    :id,
                    :first_name,
                    :last_name,
                    :email,
                    :password,
                    :role
                    )
            ';

            $stmt=$this->db->prepare($querry);

            $this->student_id=htmlspecialchars(strip_tags($this->student_id));
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->role=htmlspecialchars(strip_tags($this->role));

            $stmt->bindParam(':id', $this->student_id);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':role', $this->role);
            

            if($stmt->execute()){
                return true;
            }

            return false;
        }



        public function updateUser(){
            $querry='
                UPDATE users
                SET
                    first_name=:first_name, 
                    last_name=:last_name, 
                    email=:email, 
                    password=:password,
                    role=:role
                    WHERE id=:id
            ';
            $stmt = $this->db->prepare($querry);

            $this->student_id=htmlspecialchars(strip_tags($this->student_id));
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->role=htmlspecialchars(strip_tags($this->role));

            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':role', $this->role);
            $stmt->bindParam(':id', $this->student_id);

            if($stmt->execute()){
                return true;
            }

            return false;
        }

        public function deleteBook(){
            $querry='
                DELETE FROM books
                    WHERE id=:id
            ';

            $stmt=$this->db->prepare($querry);
            $stmt->bindParam('id',$this->book_id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }
        public function createDownload(){
            $querry='
                INSERT INTO downloads(book_id,dCount) values(:book_id,1)
            ';

            $stmt=$this->db->prepare($querry);

            $stmt->bindParam(':book_id',$this->book_id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }

   
?>