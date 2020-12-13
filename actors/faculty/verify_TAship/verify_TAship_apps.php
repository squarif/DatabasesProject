<?php

    $instructor_ID = $_POST['instructor_ID'];
    $course_ID = $_POST['course_ID'];
    $section_ID = $_POST['section_ID'];

    echo $instructor_ID; 
    echo "<br>";
    echo $course_ID;
    echo "<br>";
    echo $section_ID;
    echo "<br>";
    
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

    $sql = "SELECT * FROM `ta_application`
            WHERE `course_id` = '$course_ID'
            AND `sec_id` = '$section_ID'
            ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql)){
        echo "Viewing Applications for ";
    } else{
        echo "Query Failed";
    }

?>

<html>
<head>
    <title>Viewing Applications</title>
</head>

<body>
    <table>
        <tr>
            <th>Student ID</th>
            <th>View Applications</th>
            <th>Action</th>
        </tr>

        <?php 
            while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td > <?php echo $row['student_id']; ?> </td>
                    <td>
                    
                        <form id = "accept" action="view_student_TAship_app.php" method = "POST">
                            <input type="submit"  value = "View Application">
                            <input type="hidden" name = "student_ID" value = "<?php echo $row['student_id']; ?>" > 
                            <input type="hidden" name = "course_ID" value = "<?php echo $row['course_id']; ?>" >
                            <input type="hidden" name = "section_ID" value = "<?php echo $row['sec_id']; ?>" >
                            
                        </form>
                    </td>
                    <td>
                        <form id = "accept" action="accept_TAship_app.php" method = "POST">
                            <input type="submit"  value = "Accept">
                            <input type="hidden" name = "student_ID" value = "<?php echo $row['student_id']; ?>" > 
                            <input type="hidden" name = "course_ID" value = "<?php echo $row['course_id']; ?>" >
                            <input type="hidden" name = "section_ID" value = "<?php echo $row['sec_id']; ?>" >

                        </form>

                    </td>
                </tr>  
                  
        <?php } ?>
    </table>
</body>
</html>