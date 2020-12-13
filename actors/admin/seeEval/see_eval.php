<?php
    year = _GET["year"];
    semester = _GET["semester"];
    facultyID = _GET["facultyID"];
    courseID = _GET["courseID"];
    secID = _GET["secID"];

    if(year == "0" OR semester == "0" OR secID == "0"){
      session_start();
      _SESSION['facultyID'] = facultyID;
      _SESSION['courseID'] = courseID;
      _SESSION['secID'] = secID;
      _SESSION['year'] = year;
      _SESSION['semester'] = semester;
      header("Location: see_eval2.php");
    }

    servername = 'localhost';
    username = 'root';
    password = '';
    dbname = 'db_proj';

    // Create connection
    conn = new mysqli(servername, username, password, dbname);

      if (conn->connect_error) {
      
      die("Connection failed: " . conn->connect_error);

      } 

        sql = "SELECT faculty_id, course_id, sec_id, year, semester, AVG(delivery) as delivery, AVG(management) as management, AVG(engagement) as engagement
                FROM `evaluation`
                WHERE faculty_id = facultyID AND course_id = courseID AND sec_id = secID AND year = year AND semester = 'semester'
                GROUP BY faculty_id, course_id, sec_id, year, semester";

        sql1 = "SELECT name
                FROM faculty
                WHERE faculty_id = facultyID";
        result = mysqli_query(conn, sql);
        result1 = mysqli_query(conn, sql1);

        row = mysqli_fetch_assoc(result);
        row1 = mysqli_fetch_assoc(result1);

        delivery = (row['delivery']/10)*100;
        management = (row['management']/10)*100;
        engagement = (row['engagement']/10)*100;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Evaluation results</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            body{
            align-items: center;
            justify-content: center;
            font-family: 'Open Sans',sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f3f1f1;
            background-image: url("photo.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            }

            .skills{
            width: 100%;
            max-width: 600px;
            padding: 0 20px;
            }

            .skill-name{
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 20px 0;
            }

            .skill-bar{
            height: 20px;
            background: #cacaca;
            border-radius: 8px;
            }

            .skill-per{
            height: 20px;
            background-color: #0fbcf9;
            border-radius: 8px;
            width: 0;
            transition: 1s linear;
            position: relative;
            }

            .skill-per::before{
            content: attr(per);
            position: absolute;
            padding: 4px 6px;
            background-color: #000;
            color: #fff;
            font-size: 12px;
            border-radius: 4px;
            top: -35px;
            right: 0;
            transform: translateX(50%);
            }

            .skill-per::after{
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #000;
            top: -16px;
            right: 0;
            transform: translateX(50%) rotate(45deg);
            border-radius: 2px;
            }
        </style>
    </head>
    <body>
    <div class="skills">
      <div class="skill">
        <div class="skill-name">Delivery</div>
        <div class="skill-bar">
          <div class="skill-per" per= <?=delivery; ?>> </div>
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Management</div>
        <div class="skill-bar">
          <div class="skill-per" per=<?=management; ?>></div>
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Engagement</div>
        <div class="skill-bar">
          <div class="skill-per" per=<?=engagement; ?>></div>
        </div>
      </div>
    </div>

    <script>
      ('.skill-per').each(function(){
        var this = (this);
        var per = this.attr('per');
        this.css("width",per+'%');
        ({animatedValue: 0}).animate({animatedValue: per},{
          duration: 1000,
          step: function(){
            this.attr('per', Math.floor(this.animatedValue) + '%');
          },
          complete: function(){
            this.attr('per', Math.floor(this.animatedValue) + '%');
          }
        });
      });
    </script>
    </body>