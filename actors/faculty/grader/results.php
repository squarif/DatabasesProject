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
$username = 'id15668406_hammadjamal';
$password = 's9W^-~a+PlrO]]?j';
$dbname = 'id15668406_project';

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
        echo "";
    } else{
        echo "Query Failed";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Current Courses</title>
    <title>Administrator</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
           <style>
           /*	
	Side Navigation Menu V2, RWD
	===================
	Author: https://github.com/pablorgarcia
 */

          @charset "UTF-8";
          @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

          body {
          font-family: 'Open Sans', sans-serif;
          font-weight: 300;
          line-height: 1.42em;
          color:white;
          background-color:#1F2739;
          }

          h3{
          font-size:2em; 
          font-weight:bold ;
          line-height:1em;
          text-align: center;
          color: white;
          }

          h2 {
          font-size:3em; 
          font-weight: bold;
          text-align: center;
          display: block;
          line-height:1em;
          padding-bottom: 2em;
          color: white;
          }

          h2 a {
          font-weight: 700;
          text-transform: uppercase;
          color: #FB667A;
          text-decoration: none;
          }

          .blue { color: #185875; }
          .yellow { color: #FFF842; }

          .container th h1 {
               font-weight: bold;
               font-size: 1em;
          text-align: left;
          color: #185875;
          }

          .container td {
               font-weight: normal;
               font-size: 1em;
          -webkit-box-shadow: 0 2px 2px -2px #0E1119;
               -moz-box-shadow: 0 2px 2px -2px #0E1119;
                    box-shadow: 0 2px 2px -2px #0E1119;
          }

          .container {
               text-align: left;
               overflow: hidden;
               width: 80%;
               margin: 0 auto;
          display: table;
          padding: 0 0 8em 0;
          }

          .container td, .container th {
               padding-bottom: 2%;
               padding-top: 2%;
          padding-left:2%;  
          }

          /* Background-color of the odd rows */
          .container tr:nth-child(odd) {
               background-color: #323C50;
          }

          /* Background-color of the even rows */
          .container tr:nth-child(even) {
               background-color: #2C3446;
          }

          .container th {
               background-color: #1F2739;
          }

          .container td:first-child { color: #FB667A; }

          .container tr:hover {
          background-color: #464A52;
          -webkit-box-shadow: 0 6px 6px -6px #0E1119;
               -moz-box-shadow: 0 6px 6px -6px #0E1119;
                    box-shadow: 0 6px 6px -6px #0E1119;
          }

          .container td:hover {
          background-color: #FFF842;
          color: #403E10;
          font-weight: bold;
          
          box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
          transform: translate3d(6px, -6px, 0);
          
          transition-delay: 0s;
               transition-duration: 0.4s;
               transition-property: all;
          transition-timing-function: line;
          }

          @media (max-width: 800px) {
          .container td:nth-child(4),
          .container th:nth-child(4) { display: none; }
          }
        </style>
</head>

<body>

    
    <div class="container" style="width:900px;">  
        <h2 align="center">Grader</h2>
        <h3>
            <?php
                // echo "<br>";
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
        </h3>  
    </div>        
                    
    <div class="student_grades" id="student_table">
        <table class = "table table-bordered">
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

        
        
    </table>
    <h3>
        <?php 
            $mean = $sum/$count; 
            
            echo "<br>";
            echo "Mean: ";
            echo $mean;
            echo "<br>";
            echo "Standard Deviation: ";
            echo $standard_dev;
            echo "<br>";
                    
        ?>
    </h3>
    
    <form id = "accept" action="grade.php" method = "POST" align = "center">
        <input type="text" name = "grade_on_mean" placeholder = "Grade on mean">
        <input type="submit"  value = "Run Grader" class="btn btn-success">
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