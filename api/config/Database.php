<?php

class Database{
    private $host= "localhost:3306";
    private $dbname="id20748849_student_library";
    private $username="root";
    private $password="Password1234.";
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