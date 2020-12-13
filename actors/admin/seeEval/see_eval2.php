<?php 
    session_start();
    $facultyID = $_SESSION['facultyID'];
    $courseID = $_SESSION['courseID'];
    $secID = $_SESSION['secID'];
    $year = $_SESSION['year'];
    $semester = $_SESSION['semester'];

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_proj';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($year == "0" AND $semester == "0" AND $secID == "0"){
        $sql = "SELECT faculty_id, course_id, sec_id, year, semester, AVG(delivery) as delivery, AVG(management) as management, AVG(engagement) as engagement
                FROM `evaluation`
                WHERE faculty_id = $facultyID AND course_id = $courseID
                GROUP BY faculty_id, course_id, sec_id, year, semester";
    }

    else if($year == "0" AND $semester == "0"){
        $sql = "SELECT faculty_id, course_id, sec_id, year, semester, AVG(delivery) as delivery, AVG(management) as management, AVG(engagement) as engagement
                FROM `evaluation`
                WHERE faculty_id = $facultyID AND course_id = $courseID AND sec_id = $secID
                GROUP BY faculty_id, course_id, sec_id, year, semester";
    }

    else if($semester == "0" AND $secID == "0"){
        $sql = "SELECT faculty_id, course_id, sec_id, year, semester, AVG(delivery) as delivery, AVG(management) as management, AVG(engagement) as engagement
                FROM `evaluation`
                WHERE faculty_id = $facultyID AND course_id = $courseID AND year = $year
                GROUP BY faculty_id, course_id, sec_id, year, semester";        
    }

    else if($secID = "0" AND $year == "0"){
        $sql = "SELECT faculty_id, course_id, sec_id, year, semester, AVG(delivery) as delivery, AVG(management) as management, AVG(engagement) as engagement
                FROM `evaluation`
                WHERE faculty_id = $facultyID AND course_id = $courseID AND semestet = $semester
                GROUP BY faculty_id, course_id, sec_id, year, semester"; 
    }
    $result = mysqli_query($conn, $sql);
    
    $sql1 = "SELECT name
             FROM faculty
             WHERE faculty_id = $facultyID";

    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html lang="en">
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
            background-image: url("photo.jpg");
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
     <div class='container'>
         <div class='table'>
             <div class='table-header'>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>name</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>ID</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>course ID</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>sec ID</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>semester</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>year</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>delivery</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>management</a></div>
                 <div class='header__item'><a id='wins' class='filter__link filter__link--number'>engagement</a></div>
             </div>
             <div class='table-content'>
                <?php  
                    while($row = mysqli_fetch_array($result)){  
                ?>
                    <div class='table-row'>
                        <div class='table-data'><?php echo $row1['name'] ?></div>
                        <div class='table-data'><?php echo $row['faculty_id'] ?></div>
                        <div class='table-data'><?php echo $row['course_id'] ?></div>
                        <div class='table-data'><?php echo $row['sec_id'] ?></div>
                        <div class='table-data'><?php echo $row['semester'] ?></div>
                        <div class='table-data'><?php echo $row['year'] ?></div>
                        <div class='table-data'><?php echo $row['delivery'] ?></div>
                        <div class='table-data'><?php echo $row['management'] ?></div>
                        <div class='table-data'><?php echo $row['engagement']?></div>
                    </div>
                <?php
                    }
                ?>
             </div>
        </div>
</body>
</html>