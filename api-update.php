<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$scity = $data['scity'];

include "dbConnection.php";

$sql = "UPDATE `students` SET `student_name`='{$name}',`age`='{$age}',`city`='{$scity}' WHERE `ID`= '{$id}'";
//echo "UPDATE `students` SET `student_name`='{$name}',`age`='{$age}',`city`='{$scity}' WHERE `ID`= '{$id}'";
if (mysqli_query($con, $sql)) {
    echo json_encode(array('message' => 'Student Record updated.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not update.', 'status' => false));
}
