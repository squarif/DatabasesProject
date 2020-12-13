<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');

            $base-spacing-unit: 24px;
            $half-spacing-unit: $base-spacing-unit / 2;

            $color-alpha: #1772FF;
            $color-form-highlight: #EEEEEE;

            *, *:before, *:after {
                box-sizing:border-box;
            }

            body {
                font-family:'Source Sans Pro', sans-serif;
                background-image: url("eval_results.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

            h1,h2,h3,h4,h5,h6 {
                margin:0;
            }

            .container {
                max-width: 1000px;
                margin-right:auto;
                margin-left:auto;
                display:flex;
                justify-content:center;
                align-items:center;
                min-height:100vh;
            }

            .table {
                width:100%;
                border:4px solid $color-form-highlight;
            }

            .table-header {
                display:flex;
                width:100%;
                background:#000;
                padding:($half-spacing-unit * 1.5) 0;
            }

            .table-row {
                display:flex;
                width:100%;
                padding:($half-spacing-unit * 1.5) 0;
                background:$color-form-highlight;
            }

            .table-data, .header__item {
                flex: 1 1 20%;
                text-align:center;
            }

            .filter__link {
                color:white;
                text-decoration: none;
                position:relative;
                display:inline-block;
                padding-left:$base-spacing-unit;
                padding-right:$base-spacing-unit;
                
                &::after {
                    content:'';
                    position:absolute;
                    right:-($half-spacing-unit * 1.5);
                    color:white;
                    font-size:$half-spacing-unit;
                    top: 50%;
                    transform: translateY(-50%);
                }
                
                &.desc::after {
                    content: '(desc)';
                }

                &.asc::after {
                    content: '(asc)';
                }   
            }
        </style>
    </head>
<body>
<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'demo_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  
  die("Connection failed: " . $conn->connect_error);

}

$sql = "SELECT name, student_id, password, contact, address
        FROM `student`
        WHERE student_id = 1 ;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


 <div class='container'> ;
	
 <div class='table'> ;
     <div class='table-header'> ;
         <div class='header__item'><a id='wins' class='filter__link filter__link--number'>name</a></div> ;
         <div class='header__item'><a id='wins' class='filter__link filter__link--number'>ID</a></div> ;
         <div class='header__item'><a id='wins' class='filter__link filter__link--number'>password</a></div> ;
         <div class='header__item'><a id='wins' class='filter__link filter__link--number'>contact</a></div> ;
         <div class='header__item'><a id='wins' class='filter__link filter__link--number'>address</a></div> ;
     </div> ;
     <div class='table-content'> ;
         <div class='table-row'> ;
             <div class='table-data'>".$row['name']."</div> ;
             <div class='table-data'>".$row['student_id']."</div> ;
             <div class='table-data'>".$row['password']."</div> ;
             <div class='table-data'>".$row['contact']."</div> ;
             <div class='table-data'>".$row['address']."</div> ;
         </div> ;
     </div> ;
echo"</div> ;
?>
