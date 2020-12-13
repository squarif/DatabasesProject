<?php

    $instructor_ID = $_POST['instructor_ID'];
    $course_ID = $_POST['course_ID'];
    $section_ID = $_POST['section_ID'];
    $current_sem = $_POST['current_sem'];
    $current_year = $_POST['current_year'];

    $mean = $_POST['mean'];
    $SD = $_POST['standev']/2;
    $grade_on_mean = $_POST['grade_on_mean'];

    echo "Mean score: ", $mean;
    echo "<br>";
    echo "SD: ", $SD;
    echo "<br>";
    echo "Grade on Mean: ";
    echo $grade_on_mean;

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

    if(mysqli_query($conn, $sql)){
        echo "Running Grader";
    } else{
        echo "Query Failed";
    }

    $grades = array(
        10 => "A+",
        9 => "A",
        8 => "A-",
        7 => "B+", 
        6 => "B",
        5 => "B-",
        4 => "C+",
        3 => "C",
        2 => "C-",
        1 => "D",
        0 => "F",
    );

    $grade_num = array_search($grade_on_mean, $grades) ;
    echo $grade_num;
    echo "<br>";
   
    while($row = mysqli_fetch_assoc($result)){ 
        $marks = $row['marks'];
        // echo $marks;
        echo "<br>";

        $grade = "";

        $i = 0;
        $j = 11;
        // for($i = 0 ; $i <= 11 - $grade_num; $i++){
        //     echo $mean + ($i * $SD), "_____","$i","________" , $i+$grade_num, "__", $grades[$i+$grade_num] ,"_____________", $marks;
        //     echo "<br>";
        //     if($marks > ($mean + ($i * $SD)) and $marks < ($mean + ($i+1) * $SD)){
        //         //$grade = $grades[i];
        //         // 
        //         echo "YES ";
        //     }
        // }
        for($i =  0-$grade_num; $i+$grade_num < 11; $i++){
            // echo $mean + ($i*0.5 * $SD), "_______","$i","______" , $i+$grade_num, "__", $grades[$i+$grade_num] ,"_____________", $marks;
            // echo "<br>";
            if($marks > ($mean + ($i * $SD)) and $marks < ($mean + ($i+1) * $SD)){
                $grade = $grades[$i+$grade_num];
                // 
                // echo "YES ";
            }
        }

        $student_ID = $row['student_id'];
        $course_ID = $row['course_id'];
        $section_ID = $row['sec_id'];
        $current_sem = $row['semester'];
        $current_year = $row['year'];
        

        $sql = "UPDATE enrolled 
                SET `grade` = '$grade' 
                WHERE `student_id` = '$student_ID'
                    AND `course_id` = '$course_ID'
                    AND `sec_id` = '$section_ID'
                    AND `semester` = '$current_sem'
                    AND `year` = '$current_year'
                ";

            if(mysqli_query($conn, $sql)){
                echo "Grade Assigned";
            } else{
                echo "Query Failed";
            }
        



        
        // switch($marks) {
        //     case A+ > 
        //     $mean+1.0*$SD < A <= $mean +1.5 *$SD
        //     $mean+0.5*$SD < B+ <= $mean+1.0*$SD
        //     $mean < B <= $mean+0.5*$SD
        //     $mean-0.5*$SD < C <= $mean
        //     $mean-1.0*$SD < D <= $mean-0.5*$SD
        //     $mean-1.5*$SD < F <=$mean -1.5*$SD

        //     case $marks >= $mean + 4 * $SD: //A+
        //         $grade_key = $grade_num + 4;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean + 3 * $SD and < $mean + 4 * $SD: //A
        //         $grade_key = $grade_num + 3;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean + 2 * $SD: //A-
        //         $grade_key = $grade_num + 2;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean + 1 * $SD: //B+
        //         $grade_key = $grade_num + 1;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean:
        //         $grade_key = $grade_num; //MEAN = B
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean - 1 * $SD: //B-
        //         $grade_key = $grade_num - 1;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean - 2 * $SD: //C+
        //         $grade_key = $grade_num - 2;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean - 3  * $SD: //C
        //         $grade_key = $grade_num - 3;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean - 4 * $SD: //C-
        //         $grade_key = $grade_num - 4;
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean - 5 * $SD:
        //         $grade_key = $grade_num - 5; //D
        //         $grade = $grades[$grade_key];
        //         break;
        //     case $marks >= $mean + 1.5 * $SD: //F
        //         $grade_key = $grade_num - 6;
        //         $grade = $grades[$grade_key];
        //         break;
                
                                                    
            
            
        //     default:
        //     echo 'something else';
        // }

        // switch($marks) {
        //     case $marks >= 90 and $marks <= 100:
        //         $grade = 'A+';
        //         break;
        //     case $marks >= 80 and $marks <= 89:
        //         $grade = 'A';
        //         break;
        //     case $marks >= 70 and $marks <= 79:
        //         $grade = 'B';
        //         break;
        //     case $marks >= 60 and $marks <= 69:
        //         $grade = 'C';
        //         break;
        //     case $marks >= 50 and $marks <= 59:
        //         $grade = 'D';
        //         break;
        //     case $marks > 50 and $marks <= 60:
        //         $grade = 'F';
        //         break;
            
        //     default:
        //     echo 'something else';
        // }
        
        


    }

?>

<html>
    <form id = "accept" action="results.php" method = "POST">
        <input type="submit" value = "Go to Results">
        <input type="hidden" name = "instructor_ID" value = "<?php echo $instructor_ID ?>" >
        <input type="hidden" name = "current_sem" value = "<?php echo $current_sem ?>" >
        <input type="hidden" name = "current_year" value = "<?php echo $current_year ?>" > 
        <input type="hidden" name = "course_ID" value = "<?php echo $course_ID; ?>" >
        <input type="hidden" name = "section_ID" value = "<?php echo $section_ID; ?>" >
        <input type="hidden" name = "mean" value = "<?php echo $mean; ?>" >
        <input type="hidden" name = "standev" value = "<?php echo $SD; ?>" >                   
    </form>









</html>