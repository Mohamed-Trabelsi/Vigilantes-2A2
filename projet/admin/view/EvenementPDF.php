<?php
     require 'fpdf.php';
     
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',20);
        $pdf->setTextColor(252, 3, 3);
        $pdf->Cell(190,20,'Evenements',0,1,'C');
        $pdf->setLeftMargin(17);
        $pdf->setTextColor(0, 0, 0);

        $pdf->SetFont('Arial','B',11);
        $pdf->Image('../assets/img/logo.png',13,13,13,13,'png');
        $pdf->Cell(20,10,"Date:",0,0,'C');
        $pdf->Cell(5,10,date("j-n-Y"),0,1,'C');
        // table column
        $pdf->Cell(10,10,'No',1,0,'C');
        $pdf->Cell(33,10,'Nom evenement',1,0,'C');
        $pdf->Cell(20,10,'adresse',1,0,'C');
        $pdf->Cell(40,10,'dateD',1,0,'C');
        $pdf->Cell(40,10,'DateF',1,0,'C');
        $pdf->Cell(33,10,'nbr participants',1,1,'C');

        // table rows
        
        $pdf->SetFont('Arial','',10);
        $con = new PDO('mysql:host=localhost;dbname=site_1_1','root','');
        $query ="SELECT * FROM evenements";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                         $i=0;
            while($evenements = $result->fetch())
            {
              $pdf->Cell(10,10,++$i,1,0,'C');
              $pdf->Cell(33,10,$evenements['nom'],1,0,'C');
              $pdf->Cell(20,10,$evenements['adresse'],1,0,'C');
              $pdf->Cell(40,10,$evenements['dateD'],1,0,'C');
              $pdf->Cell(40,10,$evenements['dateF'],1,0,'C');
              $pdf->Cell(33,10,$evenements['nb_participant'],1,1,'C');
            }

        }

        $pdf->Output();
           
 
?>