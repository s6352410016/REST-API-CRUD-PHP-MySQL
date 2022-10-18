<?php
    class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'rest_api_crud_php';
        private $conn;

        public function getConnection(){
            try{
                $this->conn = null;
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}" , $this->user , $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->conn;
        }
    }
?>