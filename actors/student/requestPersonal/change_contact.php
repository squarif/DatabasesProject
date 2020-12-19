<?php

    // session_start();
    // $user_id = $_SESSION['user_id'];

$user_id = $_GET['student_ID'];
$new_contact = $_GET['newcontact'];
$ref_num = "2";

$servername = 'localhost';
$username = 'id15668406_hammadjamal';
$password = 's9W^-~a+PlrO]]?j';
$dbname = 'id15668406_project';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn == false){
    echo "CONN FAILED";
}

$sql = "INSERT INTO `change_requests` (student_id, refrence_no, info) VALUES ('$user_id', '$ref_num', '$new_contact') ";

if(mysqli_query($conn, $sql)){
    echo "Query SUCCESSFUL";
    
} else{
    echo "Query Failed";
}

mysqli_close($conn);

    

header("Location: /actors/student/requestPersonal/reqChange.html");

    

?>