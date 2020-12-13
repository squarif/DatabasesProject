<?php

    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = "demo_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn == false){
        echo "CONN FAILED";
    }

    $user_ID = $_POST['student_ID'];
    $info = $_POST['info'];
    $reference_no = $_POST['reference_no'];

    // echo $user_ID;
    echo "1";
    echo $info;
    echo "1";
    // echo $reference_no;




    if($reference_no == '1'){
        $add = $info;

        $sql = "UPDATE student SET `address` = '$add' WHERE `student_id` = '$user_ID'";
        if(mysqli_query($conn, $sql)){
            // echo "REQUEST ACCEPTEDD";
            
        } else{
            // echo "Query Failed";
        }
    }

    elseif($reference_no == '2'){
        $cont = $info;


        $sql = "UPDATE student SET `contact` = '$cont' WHERE `student_id` = '$user_ID'";
        if(mysqli_query($conn, $sql)){
            // echo "REQUEST ACCEPTEDD";
        } else{
            // echo "Query Failed";
        }
    }

    $sql = "DELETE FROM change_requests WHERE `student_id` = '$user_ID' AND `reference_no` = '$reference_no' AND `info` = '$info' ";
    if(mysqli_query($conn, $sql)){
        echo "UPDATED";
       
    } else{
        echo "Query Failed";
        echo("Error description: " . mysqli_error($conn));
    } 

    header('Location: http://localhost/Adnan/entertainPersonal/entPer.php');
        
    die();
        
?>