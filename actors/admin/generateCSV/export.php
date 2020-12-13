<?php  
      //export.php  
$val = $_POST["export"];
require 'database.php';
$database = new Database();
// echo "Here";
// echo $val;
 if(isset($_POST["export"]) && $val == 'Export Admin' )  
 {  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=admin.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array("admin_id", "name", "password"));  
      $admin= $database->runQuery("SELECT * FROM `admin`");

      while($row = mysqli_fetch_assoc($admin))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 elseif ( isset($_POST["export"]) && $val == 'Export Change Requests')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=ChangeRequests.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array(	"student_id" ,	"refrence_no"	, "data"));  
    $admin= $database->runQuery("SELECT * FROM `change_requests`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }
 elseif ( isset($_POST["export"]) && $val == 'Export Courses')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Courses.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array(	"course_id", "title", "dept_name", "credits"));  
    $admin= $database->runQuery("SELECT * FROM `course`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }
 elseif (isset($_POST["export"]) && $val == 'Export Departments')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=departments.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array(	"building", "dept_name"));  
    $admin= $database->runQuery("SELECT * FROM `department`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Enrolled')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Enrolled.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array(	"student_id",	"course_id",	"sec_id","semester"	,"year",	"grade",	"marks"));  
    $admin= $database->runQuery("SELECT * FROM `enrolled`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }

 elseif (isset($_POST["export"]) && $val == 'Export Requests')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Requests.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("course_id"	,"sec_id",	"student_id","time_stamp"
));  
    $admin= $database->runQuery("SELECT * FROM `enrollment_requests`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);




 }




 elseif (isset($_POST["export"]) && $val == 'Export Evaluation')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Evaluations.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array( "faculty_id","course_id","student_id","sec_id","year","semester","delivery","management","engagement","comments"));  
    $admin= $database->runQuery("SELECT * FROM `evaluation`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Faculty')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Faculty.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("faculty_id","name",	"password","address","dept_name","contact","salary"));  
    $admin= $database->runQuery("SELECT * FROM `faculty`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Help Desk')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=HelpDesk.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("helpdesk_id","name"	,"password"));  
    $admin= $database->runQuery("SELECT * FROM `helpdesk`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Lecturers')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Lecturers.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("faculty_id",	"course_id",	"sec_id",	"semester",	"year"));  
    $admin= $database->runQuery("SELECT * FROM `lecturer`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Pre Reqs')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=PreReqs.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("course_id",	"prereq_id"));  
    $admin= $database->runQuery("SELECT * FROM `prereq`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Sections')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Sections.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("course_id", "sec_id","semester","year","building" ,"room_number","time_slot_id"));  
    $admin= $database->runQuery("SELECT * FROM `section`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Students')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Students.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("student_id"	,"name","password","address","contact","dept_name"
));  
    $admin= $database->runQuery("SELECT * FROM `student`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export TA Applications')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=TA-Apps.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("student_id",	"course_id", 	"sec_id"
));  
    $admin= $database->runQuery("SELECT * FROM `ta_application`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Venues')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Venues.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array(	"building",	"room_number",	"capacity"
));  
    $admin= $database->runQuery("SELECT * FROM `venue`");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }



 elseif (isset($_POST["export"]) && $val == 'Export Time Slot')
 {

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=TimeSlot.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array("time_slot_id",	"day",	"start_hr",	"start_min",	"end_hr",	"end_min"));  
    $admin= $database->runQuery("SELECT * FROM `time_slot");

    while($row = mysqli_fetch_assoc($admin))  
    {  
           fputcsv($output, $row);  
    }  
    fclose($output);



 }
 ?>