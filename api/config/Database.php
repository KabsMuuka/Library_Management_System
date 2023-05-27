<?php

class Database{
    private $host= "localhost";
    private $dbname="student_library";
    private $username="root";
    private $password="tumbwerobert";
    private $conn;

    public function connect(){
        $this->conn = null;

        try{
            $this->conn=new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Error connecting..'. $e->getMessage();
        }

        return $this->conn;
    }
}
?>