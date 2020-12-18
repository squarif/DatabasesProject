<?php

    $instructor_id = 22100303;
    $instructor_id = $_POST['instructor_ID'];
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
        echo "Query Successful";
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
                       
                    
            <div class="student_grades" id="student_table">
                <table class = "table table-bordered">
                    <tr>
                        <th width="25%"th>Course ID</th>
                        <th width="25%">Section </th>
                        <th width="25%"> Process </th> 
            
                        <?php 
                            while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td > <?php echo $row['course_id']; ?> </td>
                                    <td > <?php echo $row['sec_id']; ?> </td>
                                    <td>
                                    
                                        <form id = "accept" action="results.php" method = "POST" align = "centre">
                                            <input type="submit"  value = "View Student for this Section" class = "btn btn-success">
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
            </div>
    </div>
</body>

</html>