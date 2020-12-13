<?php

    $instructor_ID = $_POST['instructor_ID'];
    $course_ID = $_POST['course_ID'];
    $section_ID = $_POST['section_ID'];
    $current_sem = $_POST['current_sem'];
    $current_year = $_POST['current_year'];

    $count = 0; 
    $sum = 0;
    $mean = 0;

    // echo $instructor_ID; 
    // echo "<br>";
    // echo $course_ID;
    // echo "<br>";
    // echo $section_ID;
    // echo "<br>";
    // echo $current_sem;
    // echo "<br>";
    // echo $current_year;
    // echo "<br>";
    
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

    $sql = "SELECT * FROM `enrolled` 
            WHERE `course_id` = '$course_ID' 
                AND `sec_id` = '$section_ID'
                AND `semester` = '$current_sem'
                AND `year` = '$current_year'   
            ";

    $result = mysqli_query($conn, $sql);

    $sql = "SELECT STD(marks) AS SD
            FROM `enrolled` 
            WHERE `course_id` = '$course_ID' 
                AND `sec_id` = '$section_ID'
                AND `semester` = '$current_sem'
                AND `year` = '$current_year'   
            ";

    $standard_dev = mysqli_query($conn, $sql);
    $standard_dev = mysqli_fetch_assoc($standard_dev);

    $standard_dev = $standard_dev['SD'];
    

    if(mysqli_query($conn, $sql)){
        echo "Query Successful";
    } else{
        echo "Query Failed";
    }

?>

<html>
<head>
    <title>Student Score</title>
    
</head>

<body>
    <?php
        echo "<br>";
        echo "Viewing Student Scores for course: ";
        echo $course_ID;
        echo "<br>";
        echo "Section: ";
        echo $section_ID;
        echo "<br>";
        echo $current_sem;
        echo "<br>";
        echo $current_year;
        echo "<br>";

    ?>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Percentage</th>
            <th>Grade Assigned</th>
            
        </tr>

        <?php
            
            while($row = mysqli_fetch_assoc($result)){ 
                $count++;
                $sum = $sum + $row['marks'];
                
                ?>
                
                <tr>
                    <td > <?php echo $row['student_id']; ?> </td>
                    <td > <?php echo $row['marks']; ?> </td>
                    <td > <?php echo $row['grade']; ?> </td>                      
                </tr>  
                  
        <?php } ?>

        
        <?php 
            $mean = $sum/$count; 
            echo "Mean: ";
            echo $mean;
            echo "<br>";
            echo "Standard Deviation: ";
            echo $standard_dev;
                
        ?>
    </table>
    
    <form id = "accept" action="grade.php" method = "POST">
        <input type="text" name = "grade_on_mean" placeholder = "Grade on mean">
        <input type="submit"  value = "Run Grader">
        <input type="hidden" name = "mean" value = "<?php echo $mean; ?>" >
        <input type="hidden" name = "standev" value = "<?php echo $standard_dev; ?>" >
        <input type="hidden" name = "student_ID" value = "<?php echo $row['student_id']; ?>" > 
        <input type="hidden" name = "current_sem" value = "<?php echo $current_sem ?>" >
        <input type="hidden" name = "current_year" value = "<?php echo $current_year ?>" > 
        <input type="hidden" name = "course_ID" value = "<?php echo $course_ID; ?>" >
        <input type="hidden" name = "section_ID" value = "<?php echo $section_ID; ?>" >
        <input type="hidden" name = "instructor_ID" value = "<?php echo $instructor_ID; ?>" >
                          
    </form>

                    

    
</body>
</html>