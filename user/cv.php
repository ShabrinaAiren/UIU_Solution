<?php
    
  
    // print_r($user);
    // die();
ob_end_clean();
require('fpdf/fpdf.php');

  
class PDF extends FPDF {
  
    // Page header
    function Header() {
          
        // Add logo to page
        // $this->Image('cv.jpg',90,10,33);


        // Set font family to Arial bold 
        $this->SetFont('Arial','B',20);
        
        // Move to the right
        $this->Cell(60);
        $this->Cell(70,10,'Curriculum Vitae',1,0,'C');
        
        // Header
          
        // Line break
        $this->Ln(20);
    }
  
    // Page footer
    function Footer() {
          
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Arial italic 8
        $this->SetFont('Arial','I',8);
          
        // Page number
        $this->Cell(0,10,'Page ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}
  
// Instantiation of FPDF class
$pdf = new PDF();
  
// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);

  require('custom_function.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    $user = fetch_all_data_usingDB($db,"SELECT * FROM user WHERE id = '$user_id'");
    $school_id = $user['school_division'];
    $institution = fetch_all_data_usingDB($db,"SELECT * FROM schools WHERE id = '$school_id'");
    $myprojects = fetch_all_data_usingPDO($pdo,"SELECT * FROM project_proposal WHERE user_id = '$user_id' and status = 1");
    


    $pdf->Cell(0, 6, 'Name: '. $user['name'], 0, 1);
    $pdf->Cell(0, 6, 'Email: '. $user['email'], 0, 1);
    $pdf->Cell(0, 6, 'ID: '. $user['official_id'], 0, 1);
    $pdf->Cell(0, 6, 'Contact: '. $user['contact'], 0, 1);
    $pdf->Cell(0, 6, 'Institution: '. $institution['school_name'], 0, 1);
    $pdf->Cell(0, 6, 'CGPA: '. $user['cgpa'], 0, 1);
    
    $pdf->Ln(10);

    if(!empty($myprojects)){
         $pdf->Cell(0, 6, 'CAREER OBJECTIVE:', 0, 1);
          $pdf->Ln(5);
        $pdf->Cell(0, 6, 'I enjoy interactive fields and want to be related with education and research which may enable', 0, 1);
        $pdf->Cell(0, 6, 'me to explore the learning process to the maximum and have a passion to contribute to the field', 0, 1);
        $pdf->Cell(0, 6, 'I can demonstrate myself as a person of professional excellence.', 0, 1);
         $pdf->Ln(5);
         $pdf->Cell(0, 6, 'ACHIVMENTS:', 0, 1);
        $pdf->Ln(5);
        
        function findCourse($db, $id){
            $course = fetch_all_data_usingDB($db, "SELECT * FROM course_list WHERE id = '$id'");
            return $course['name'];
        }

        foreach($myprojects as $key => $project){
            
            // $pdf->Cell(60);
            $pdf->Cell(0, 6, 'Project: '. ($key+1), 0, 1);
            $pdf->Ln(2);

            $pdf->Cell(0, 6, 'Project Title: '. $project['title'], 0, 1);
            $pdf->Cell(0, 6, 'Course: '. findCourse($db,$project['course_id']), 0, 1);
            $pdf->Cell(0, 6, 'Supervisor: '. $project['supervisor'], 0, 1);
            $pdf->Cell(0, 6, 'Team Mates: '. $project['team'], 0, 1);
            $pdf->Cell(0, 6, 'Project Position: '. $project['position'], 0, 1);
            $pdf->Cell(0, 6, 'Project Trimester: '. $project['trimester'], 0, 1);
            $pdf->Cell(0, 6, 'Project Description: '.$project['details'], 0, 1, 'L');
            $pdf->Ln(8);
        }
        $pdf->Cell(0, 6, 'DISCLAIMER:', 0, 1);
        $pdf->Cell(0, 6, 'I hereby declare that all the statements in this resume are authentic, complete and correct', 0, 1);
         $pdf->Cell(0, 6, 'according to my knowledge and beliefs.', 0, 1);
        $pdf->Ln(5);
         $pdf->Cell(0, 6, '__________________', 0, 1);
          $pdf->Cell(0, 6, 'Signature With Date', 0, 1);
        $pdf->Ln(5);
      
        
        
    }
    
    
// for($i = 1; $i <= 30; $i++)
//     $pdf->Cell(0, 10, 'line number '. $user['id'], 0, 1);
$pdf->Output();
  

?>