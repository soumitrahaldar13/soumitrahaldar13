<?php

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$scity = $data['scity'];

include "dbConnection.php";

$sql = "INSERT INTO `students`(`student_name`, `age`, `city`) VALUES ('{$name}', '{$age}', '{$scity}')";

if (mysqli_query($con, $sql)) {
    echo json_encode(array('message' => 'Student Record Inserted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not Inserted.', 'status' => false));
}
