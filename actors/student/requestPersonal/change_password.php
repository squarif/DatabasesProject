<?php

    $user_ID = $_GET['ID'];
    $old_password = $_GET['old_password'];
    $new_password1 = $_GET['new_password1'];
    $new_password2 = $_GET['new_password2'];

    $servername = 'localhost';
$username = 'id15668406_hammadjamal';
$password = 's9W^-~a+PlrO]]?j';
$dbname = 'id15668406_project';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn == false){
        echo "CONN FAILED";
    }

    
    if($sql = "SELECT * FROM `student` WHERE `student_id` = '$user_ID' AND `password` = '$old_password'"){
        if($new_password1 != $new_password2){
            echo "password not same bhai";
            header('Location:change_password.html');
        }

        else{
            $sql = "UPDATE student SET `password` = '$new_password1' WHERE `student_id` = '$user_ID'";
            if(mysqli_query($conn, $sql)){
                echo "PASSWORD CHANGED";
            } else{
                echo "Query Failed";
            }
        }
    }
    
    else{
        echo "ID or password wrong";
    }
        
   
    header("Location: /actors/student/requestPersonal/reqChange.html");


    mysqli_close($conn);
    
    
?>












?>