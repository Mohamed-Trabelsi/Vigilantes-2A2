<?php
     require 'fpdf.php';
     
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->setTextColor(252, 3, 3);
        $pdf->Cell(190,20,'Groups volontaires',0,1,'C');
        $pdf->setLeftMargin(30);
        $pdf->setTextColor(0, 0, 0);

       
        $pdf->Image('../assets/img/logo.png',13,13,13,13,'png');
        $pdf->Cell(20,10,"Date:",0,0,'C');
        $pdf->Cell(30,10,date("j-n-Y"),0,1,'C');
        // table column
        $pdf->Cell(20,10,'No',1,0,'C');
        $pdf->Cell(40,10,'Nom group',1,0,'C');
        $pdf->Cell(40,10,'num',1,0,'C');
        $pdf->Cell(50,10,'contact',1,1,'C');

        // table rows
        
        $pdf->SetFont('Arial','',14);
        $con = new PDO('mysql:host=localhost;dbname=site','root','');
        $query ="SELECT * FROM groups";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                         $i=0;
            while($groups = $result->fetch())
            {
              $pdf->Cell(20,10,++$i,1,0,'C');
              $pdf->Cell(40,10,$groups['nom'],1,0,'C');
              $pdf->Cell(40,10,$groups['num'],1,0,'C');
              $pdf->Cell(50,10,$groups['contact'],1,1,'C');
            }

        }

        $pdf->Output();
           
 
?>