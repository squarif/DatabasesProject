<?php

$Name = $_GET['Name'];
$RollNumber = $_GET['RollNumber'];
$Major = $_GET['Major'];
$CGPA = $_GET['CGPA'];
$Code = $_GET['Code'];
$CourseSection = $_GET['CourseName'];

$servername = 'localhost';
$username = 'hammad';
$password = 'Hammad@786';
$dbname = 'Project';

// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `ta_application`
VALUES ($RollNumber, '$Code', '$CourseSection');";
// echo $sql;
if(mysqli_query($conn, $sql)){

    header('Location: next.html');
}
else{

    echo 'Something Went Wrong';
}
// $row = mysqli_fetch_assoc($result);
// if ($row['name']==$name && $row['password']==$passwrd ) {
  
// //   header("Location: administrator.php"); /* Redirect browser */

// } else {
//   echo "0 results";
// }
$conn->close();





?>
