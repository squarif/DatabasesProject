<?php

$servername = 'localhost';
$username = 'id15668406_hammadjamal';
$password = 's9W^-~a+PlrO]]?j';
$dbname = 'id15668406_project';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn == false){
        echo "CONN FAILED";
    }

    $user_ID = $_POST['student_ID'];
    $info = $_POST['info'];
    $reference_no = $_POST['reference_no'];

    // echo $user_ID;
    // echo "1";
    // echo $info;
    // echo "1";
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
       
        echo "UPDATED. Redirecting";
       
    } else{
        echo "Query Failed";
        echo("Error description: " . mysqli_error($conn));
    } 

    // sleep(1);
    // header('refresh:1; Location: \DatabaseProject\DatabasesProject\actors\helpdesk\entertainPersonal\entPer.php');
        
    
      
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
        <h2 align="center">Successful</h2>

        <div class="student_grades" id="student_table">
                <table class = "table table-bordered">
                    <tr>
                    <td>
                        <form id = "accept" action="entPer.php" method = "POST" align = "centre">
                            <input type="submit"  value = "Go Back" class = "btn btn-success" align = "center">
                        </form>
                    </td>
                    
                    </tr>
                </table>
        </div>


    </div>

       
            
</body>