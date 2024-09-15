<?php

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['id'];

include "dbConnection.php";

$sql = "DELETE FROM `students` WHERE id = {$student_id}";


if (mysqli_query($con, $sql)) {
    echo json_encode(array('message' => 'Student Record Deleted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record not Deleted.', 'status' => false));
}
