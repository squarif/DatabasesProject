<?php

    $instructor_id = 22100303;
    $current_sem = "Fall";
    $current_year = "2020";

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

    $sql = "SELECT `course_id`, `sec_id` FROM `section` 
            WHERE `instructor_id` = '$instructor_id'
                AND `semester` = '$current_sem'
                AND `year` = '$current_year'   
            ";

    $result = mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql)){
        echo "Running Grader";
    } else{
        echo "Query Failed";
    }

?>

<html>
<head>
    <title>Current Courses</title>
</head>

<body>
    <table>
        <tr>
            <th>Course ID</th>
            <th>Section </th>
            <th> Process </th> 
 
            <?php 
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td > <?php echo $row['course_id']; ?> </td>
                        <td > <?php echo $row['sec_id']; ?> </td>
                        <td>
                        
                            <form id = "accept" action="results.php" method = "POST">
                                <input type="submit"  value = "View Student for this Section">
                                <input type="hidden" name = "instructor_ID" value = "<?php echo $instructor_id ?>" >
                                <input type="hidden" name = "current_sem" value = "<?php echo $current_sem ?>" >
                                <input type="hidden" name = "current_year" value = "<?php echo $current_year ?>" > 
                                <input type="hidden" name = "course_ID" value = "<?php echo $row['course_id']; ?>" >
                                <input type="hidden" name = "section_ID" value = "<?php echo $row['sec_id']; ?>" >
                            </form>

                        </td>
                    </tr>  
                    
            <?php } ?>

        </tr>
    </table>
</body>
</html>