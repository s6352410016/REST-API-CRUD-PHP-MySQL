<?php
    class Employees{
        public $id;
        public $empName;
        public $empAddress;
        public $empTel;
        public $empSalary;
        private $conn;

        public function __construct($dbConn){
            $this->conn = $dbConn;
        }

        public function getEmployees(){
            $stmt = $this->conn->query('SELECT * FROM employees');
            return $stmt;
        }

        public function insertEmployees(){
            $stmt = $this->conn->prepare('INSERT INTO employees (empName , empAddress , empTel , empSalary) VALUES(? , ? , ? , ?)');
            $stmt->bindParam(1 , $this->empName);
            $stmt->bindParam(2 , $this->empAddress);
            $stmt->bindParam(3 , $this->empTel);
            $stmt->bindParam(4 , $this->empSalary);
            return $stmt;
        }

        public function updateEmployees(){
            $stmt = $this->conn->prepare('UPDATE employees SET empName = ? , empAddress = ? , empTel = ? , empSalary = ? WHERE id = ?');
            $stmt->bindParam(1 , $this->empName);
            $stmt->bindParam(2 , $this->empAddress);
            $stmt->bindParam(3 , $this->empTel);
            $stmt->bindParam(4 , $this->empSalary);
            $stmt->bindParam(5 , $this->id);
            return $stmt;
        }

        public function deleteEmployees(){
            $stmt = $this->conn->prepare('DELETE FROM employees WHERE id = ?');
            $stmt->bindParam(1 , $this->id);
            return $stmt;
        }
    }
?>