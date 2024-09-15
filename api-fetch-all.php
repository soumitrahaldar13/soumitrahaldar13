<?php

// header(' Content-Type: application/json');
// header(' Acess-Control-Allow-Origin: *');

include "dbConnection.php";
//echo 22;
$sql = "SELECT * FROM `students`";
//echo $sql;
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
//echo 2;
if (mysqli_num_rows($result) > 0) {

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {

    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}
