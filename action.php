<?php

$actor = $_GET['actor'];
$name = $_GET['uname'];
$passwrd = $_GET["psw"];
 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'demo_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  
  die("Connection failed: " . $conn->connect_error);

}

if($actor == 1){
  
  $sql = "SELECT * FROM `faculty` WHERE `faculty_id` = '$name' AND `password` = '$passwrd'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  if ($row['faculty_id']==$name && $row['password']==$passwrd ) {
  
    header("Location: actors/faculty.html");
  
  } else {
    
    header("Location: index.html");
  
  }
}

if($actor == 2){
  
  $sql = "SELECT * FROM `helpdesk` WHERE `helpdesk_id` = '$name' AND `password` = '$passwrd'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  if ($row['helpdesk_id']==$name && $row['password']==$passwrd ) {
  
    header("Location: actors/helpdesk.html");
  
  } else {
    
    header("Location: index.html");
  
  }
}

if($actor == 3){
  
  $sql = "SELECT * FROM `student` WHERE `student_id` = '$name' AND `password` = '$passwrd'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  if ($row['student_id']==$name && $row['password']==$passwrd ) {
  
    header("Location: actors/student.html");
  
  } else {
    
    header("Location: index.html");
  
  }
}

if($actor == 4){
  
  $sql = "SELECT * FROM `admin` WHERE `admin_id` = '$name' AND `password` = '$passwrd'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  if ($row['admin_id']==$name && $row['password']==$passwrd ) {
  
    header("Location: actors/admin.html");
  
  } else {
    
    header("Location: index.html");
  
  }
}

$conn->close();

?>
