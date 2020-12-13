<?php

    // session_start();
    // $user_id = $_SESSION['user_id'];

$user_id = $_GET['student_ID'];
$new_contact = $_GET['newcontact'];
$ref_num = "2";

$servername = 'localhost';
$username = 'root';
$password = "";
$dbname = "demo_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn == false){
    echo "CONN FAILED";
}

$sql = "INSERT INTO `change_requests` (student_id, reference_no, info) VALUES ('$user_id', '$ref_num', '$new_contact') ";

if(mysqli_query($conn, $sql)){
    echo "Query SUCCESSFUL";
} else{
    echo "Query Failed";
}

mysqli_close($conn);

    

?>