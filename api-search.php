<?php

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);

$search_value = $data['search'];

include "dbConnection.php";

$sql = "SELECT * FROM students WHERE student_name like '%{$search_value}%'";

$result = mysqli_query($con, $sql) or die("SQL Query Failed.");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {

    echo json_encode(array('message' => 'No search Found.', 'status' => false));
}
