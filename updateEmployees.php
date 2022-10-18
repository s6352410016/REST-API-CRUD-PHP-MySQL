<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json; charset=UTF-8');
 
    require_once('./config/db.php');
    require_once('employees.php');
    
    $input = json_decode(file_get_contents('php://input'));

    $objDatabase = new Database();
    $dbConn = $objDatabase->getConnection();
    $objEmployees = new Employees($dbConn);
    $objEmployees->empName = $input->empName;
    $objEmployees->empAddress = $input->empAddress;
    $objEmployees->empTel = $input->empTel;
    $objEmployees->empSalary = $input->empSalary;
    $objEmployees->id = $_GET['id'];
    $stmt = $objEmployees->updateEmployees();
    if($stmt->execute()){
        $status = array('msg' => 'Successfully to updated.');
        http_response_code(200);
        echo json_encode($status);
    }else{
        $status = array('msg' => 'Error');
        http_response_code(400);
        echo json_encode($status);
    }
?>