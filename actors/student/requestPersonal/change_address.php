<?php

    session_start();
    $user_id = $_SESSION['user_id'];

$user_id = $_GET['ID'];
$ref_num = "1";
$new_address = $_GET['newaddress'];

$servername = 'localhost';
$username = 'id15668406_hammadjamal';
$password = 's9W^-~a+PlrO]]?j';
$dbname = 'id15668406_project';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn == false){
    echo "CONN FAILED";
}

$sql = "INSERT INTO `change_requests` (student_id, reference_no, info) VALUES ('$user_id', '$ref_num', '$new_address') ";

if(mysqli_query($conn, $sql)){
    echo "Query SUCCESSFUL";

} else{
    echo "Query Failed";
}
header("Location: /actors/student/requestPersonal/reqChange.html");

mysqli_close($conn);

    












?>