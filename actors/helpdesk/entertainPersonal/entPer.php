<?php

    $cars = array("Volvo", "BMW", "Toyota");
    $i = 1;

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

    $sql = "SELECT * FROM change_requests";
    $result = mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql)){
        echo "Entertain Personal Information Change Requests";
    } else{
        echo "Query Failed";
    }

?>

<!DOCTYPE html> 
<html>
<head>
            <title>Entertain Personal Information Change Requests</title>
            <title>Helpdesk</title>  
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
        <h2 align="center">Requests</h2>  
                       
                    
            <div class="student_grades" id="student_table">
                <table class = "table table-bordered">
                <tr>
                    
                    <th>Student ID</th>
                    <!-- 1 is for address, 2 is for contact -->
                    <th>Request Type</th> 
                    <th>Data</th>
                    <th>Process</th>
                </tr>

                <?php 
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td > <?php echo $row['student_id']; ?> </td>
                            <td > 
                                <?php 
                                    if($row['reference_no'] == '1' ){ echo "Address";} 
                                    else {echo "Contact";}   
                                ?> 
                            </td>
                            <td > <?php echo $row['info']; ?> </td>

                            <td>
                            
                                <form id = "accept" action="action.php" method = "POST" align = "centre">
                                    <input type="submit"  value = "Accept" class = "btn btn-success"> 
                                    <input type="hidden" name = "student_ID" value = "<?php echo $row['student_id']; ?>" >
                                    <input type="hidden" name = "reference_no" value = "<?php echo $row['reference_no']; ?>">
                                    <input type="hidden" name = "info" value = "<?php echo $row['info']; ?>" >
                                </form>

                            </td>
                        </tr>  
                        
                <?php } ?>
    </table>
</body>
</html>




