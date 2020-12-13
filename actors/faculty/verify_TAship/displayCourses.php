<?php

    $instructor_id = 22100303;

    $cars = array("Volvo", "BMW", "Toyota");
    $i = 1;

    // session_start();
    // $user_id = $_SESSION['user_id'];
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = "demo_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn == false){
        echo "CONN FAILED";
    }

    $sql = "SELECT `instructor_id`, `course_id`, `sec_id` FROM `faculty`, `section` WHERE `instructor_id` = '$instructor_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql)){
        echo "View Teacher Assistant Applications";
    } else{
        echo "Query Failed";
    }

?>

<html>
<head>
    <title>View Teacher Assistant Applications</title>
</head>

<body>
    <table>
        <tr>
            
            <th>Course ID</th>
            <!-- 1 is for address, 2 is for contact -->
            <th>Section</th> 
            
        </tr>

        <?php 
            while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td > <?php echo $row['course_id']; ?> </td>
                    <td > <?php echo $row['sec_id']; ?> </td>
                    
                    <td>
                    
                        <form id = "accept" action="verify_TAship_apps.php" method = "POST">
                            <input type="submit"  value = "View Applications">
                            <input type="hidden" name = "instructor_ID" value = "<?php echo $instructor_id ?>" > 
                            <input type="hidden" name = "course_ID" value = "<?php echo $row['course_id']; ?>" >
                            <input type="hidden" name = "section_ID" value = "<?php echo $row['sec_id']; ?>" >

                        </form>

                    </td>
                </tr>  
                  
        <?php } ?>
    </table>
</body>
</html>