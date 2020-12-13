<?php

    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = "demo_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn == false){
        echo "CONN FAILED";
    }

    $student_ID = $_POST['student_ID'];
    $course_ID = $_POST['course_ID'];
    $section_ID = $_POST['section_ID'];

    // echo $student_ID;
    // echo "1";
    // echo $course_ID;
    // echo "1";
    // echo $reference_no

    $cont = $course_ID;

    $sql = "UPDATE section SET `ta_id` = '$student_ID' WHERE `course_id` = '$course_ID' AND `sec_id` = '$section_ID' ";
    if(mysqli_query($conn, $sql)){
        echo "TA Assigned";
    } else{
        echo "Query Failed";
    }
    
    echo "<br>";

    $sql = "DELETE FROM ta_application WHERE `student_id` = '$student_ID' AND `course_id` = '$course_ID' AND `sec_id` = '$section_ID'";
    if(mysqli_query($conn, $sql)){
        echo "UPDATED";
       
    } else{
        echo "Query Failed";
        echo("Error description: " . mysqli_error($conn));
    } 

    // header('Location: http://localhost/Adnan/verif_TAship/.php');
      
    die();
        
?>