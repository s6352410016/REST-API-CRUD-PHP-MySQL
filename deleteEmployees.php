<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json; charset=UTF-8');
 
    require_once('./config/db.php');
    require_once('employees.php');

    $objDatabase = new Database();
    $dbConn = $objDatabase->getConnection();
    $objEmployees = new Employees($dbConn);
    $objEmployees->id = $_GET['id'];
    $stmt = $objEmployees->deleteEmployees();
    if($stmt->execute()){
        $status = array('msg' => 'Successfully to delete.');
        http_response_code(200);
        echo json_encode($status);
    }else{
        $status = array('msg' => 'Error.');
        http_response_code(400);
        echo json_encode($status);
    }
?>