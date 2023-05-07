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
        public $author;
        public $year_published;
        public $date_created;
        public $description;
        private $db;

        function __construct($db){
            $this->db=$db;
        }

        public function readUser(){
            $querry= '
                SELECT
                id,
                password
                FROM users
            ';
            $stmt = $this->db->prepare($querry);

            $stmt->execute();

            return $stmt;
        }
        
        public function readBooks(){
            $querry='
                SELECT
                books.id,
                book_name,
                author,
                year_published,
                description,
                dCount,
                img_url
                FROM
                books
                INNER JOIN
                images
                ON
                books.id=images.book_id
                INNER JOIN
                downloads
                ON
                downloads.book_id=books.id
                ORDER BY 
                books.id
                DESC
            ';
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

            $stmt = $this->db->prepare($querry);

            $this->book_name=htmlspecialchars(strip_tags($this->book_name));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->year_published=htmlspecialchars(strip_tags($this->year_published));
            $this->description=htmlspecialchars(strip_tags($this->description));
            
            $stmt->bindParam(':book_name', $this->book_name);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':year_published', $this->year_published);
            $stmt->bindParam(':description', $this->description);

            if($stmt->execute()){
                return true;
            }

            return false;
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
                    id,first_name,last_name,email,password
                    )
                VALUES(
                    :id,
                    :first_name,
                    :last_name,
                    :email,
                    :password
                    )
            ';

            $stmt=$this->db->prepare($querry);

            $this->student_id=htmlspecialchars(strip_tags($this->student_id));
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));

            $stmt->bindParam(':id', $this->student_id);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);

            

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
                    password=:password
                    WHERE id=:id
            ';
            $stmt = $this->db->prepare($querry);

            $this->student_id=htmlspecialchars(strip_tags($this->student_id));
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));

            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
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
            
        
    }
?>