<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    require_once('./config/db.php');
    require_once('employees.php');

    $objDatabase = new Database();
    $dbConn = $objDatabase->getConnection();
    $objEmployees = new Employees($dbConn);
    $stmt = $objEmployees->getEmployees();

    $empData = array();
    foreach($stmt as $rows){
        $arr = array(
            'id' => $rows['id'],
            'empName' => $rows['empName'],
            'empAddress' => $rows['empAddress'],
            'empTel' => $rows['empTel'],
            'empSalary' => $rows['empSalary'],
        );
        array_push($empData , $arr);
    }
    http_response_code(200);
    echo json_encode($empData);
?>