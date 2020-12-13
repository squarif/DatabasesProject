<?php
// error_reporting(E_ERROR | E_PARSE);
// include ('database.php');
// namespace Dompdf;
require 'database.php';


$passwrd = $_GET['pass'];
$username = $_GET['HIDDEN'];

$database = new Database();

$resultV = $database->runQuery("SELECT `password` FROM `student` WHERE `student_id` = 22100243");
$rowV= mysqli_fetch_assoc($resultV);

if ($rowV['password'] == $passwrd){

$result = $database->runQuery("SELECT * FROM `student` WHERE `student_id` = 22100243 and `password`='$passwrd'");
$row = mysqli_fetch_assoc($result);


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->SetTitle('Transcript');
$pdf ->SetFont('Arial', 'B', 16);
$pdf->AddPage();
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(180,18,'Academic Transcript',0 ,1,'C');
$pdf->SetFont('Arial',"B",14);

$pdf->Cell(50,8,'Name: ',0,0,'L');
$pdf->SetFont('Arial','',13);

$pdf->Cell(30,8,$row['name'],0,0,'L');
$pdf->SetFont('Arial',"B",14);

$pdf->Cell(60,8,'Address: ',0,0,'C');
$pdf->SetFont('Arial','',13);

$pdf->Cell(30,8,$row['address'],0,0,'L');
$pdf->SetFont('Arial',"B",14);

$pdf->Ln();
$pdf->Cell(50,8,'Contact: ',0,0,'L');
$pdf->SetFont('Arial','',13);

$pdf->Cell(30,8,$row['contact'],0,0,'L');
$pdf->SetFont('Arial',"B",14);

$pdf->Cell(60,8,'Major: ',0,0,'C');
$pdf->SetFont('Arial','',13);

$pdf->Cell(30,8,$row['dept_name'],0,0,'L');
$pdf->SetFont('Arial',"B",14);

$pdf->Ln();

$pdf->SetFont('Arial',"B",14);

$pdf->Cell(50,8,'Student ID: ',0,0,'L');
$pdf->SetFont('Arial','',13);

$pdf->Cell(30,8,$row['student_id'],0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(180,16,'Grades And CGPA Information',1 ,1,'C');


$pdf->SetFont('Arial',"IU",12);

$pdf->Cell(36,10,'Course Code',1,0,'C');
$pdf->Cell(52,10,'Title',1,0,'C');

$pdf->Cell(24,10,'Grade',1,0,'C');

$pdf->Cell(32,10,'Semester',1,0,'C');
$pdf->Cell(36,10,'Year',1,0,'C');
$pdf->SetFont('Arial',"",12);

$result1 = $database->runQuery("SELECT * FROM `enrolled` WHERE `student_id` = 22100243");

$pdf->Ln();

function gpa_calculator($grades){
    $points = 0;

        for ($i = 0; $i < count($grades); $i++) {

            if ($grades[$i] == 'A'){
                $points = $points + 4.0;
            }
            elseif ($grades[$i] =='A-'){
                $points = $points + 3.7;
            }
            elseif ($grades[$i] == 'B+'){
                $points = $points + 3.3;

            }
            elseif ($grades[$i] == 'B'){

                $points = $points + 3.0;

            }
            elseif ($grades[$i] == 'B-'){

                $points = $points + 2.7;

            }
            elseif ($grades[$i] =='C+'){
                $points = $points + 2.3;

            }
            elseif ($grades[$i] == 'C'){
                $points = $points + 2.0;
                
            }
            elseif ($grades[$i] == 'C-'){

                $points = $points + 1.67;

            }
            elseif ($grades[$i] == 'D+')
            {
                $points = $points + 1.33;

            }
            elseif ($grades[$i] == 'D'){

                $points = $points + 1.0;

            }
            elseif ($grades[$i] == 'F'){
                $points = $points + 0.0;

            }  
        
                



}

            
        $gpa = $points / count($grades);
        return $gpa;
 
}
$GradesArray = []; 

function WriteRow($pdf,$row,$database) {

$pdf->Cell(36,6,$row['course_id'],1,0,'C');
$id = $row['course_id'];
$result2 = $database->runQuery("SELECT DISTINCT(`title`) FROM `course` WHERE `course_id` = $id");
$row2 = mysqli_fetch_assoc($result2);
$coursename = $row2['title'];


$pdf->Cell(52,6,$coursename,1,0,'C');

$pdf->Cell(24,6,$row['grade'],1,0,'C');

// echo $row['grade'];
array_push( $GLOBALS['GradesArray'],$row['grade']);

$pdf->Cell(32,6,$row['semester'],1,0,'C');
$pdf->Cell(36,6,$row['year'],1,0,'C');
$pdf->SetFont('Arial',"",12);

$pdf->Ln();
}
for ($x = 0; $x < mysqli_num_rows($result1); $x++) {
  $row = mysqli_fetch_assoc($result1);

  WriteRow($pdf,$row,$database);
  
}

$pdf->SetFont('Arial',"BI",12);

$CGPA = gpa_calculator($GradesArray);
$pdf -> Ln();
$pdf->Cell(170,10,'CGPA:    ' .round($CGPA,2),0,0,'R');
// $pdf->Cell(36,10,'Operating Sys.',1,0,'C');

// $pdf->Cell(36,10,'A-',1,0,'C');

// $pdf->Cell(36,10,'3.7',1,0,'C');
// $pdf->Cell(36,10,'3',1,0,'C');
// $pdf->SetFont('Arial',"",14);

$pdf->Output('I', "Transcript.pdf");
// Use this video to write again when databases have been created
//https://www.youtube.com/watch?v=fHcrMWSNxSI


}
else{

    echo "Sorry! you are not authorized to access this document!";
}

























?>

