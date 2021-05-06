<?php
     require 'fpdf.php';
     
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->setTextColor(252, 3, 3);
        $pdf->Cell(200,20,'les comptes',0,1,'C');
        $pdf->setLeftMargin(10);
        $pdf->setTextColor(0, 0, 0);
        $pdf->Image('../assets/img/logo.png',13,13,13,13,'png');
        $pdf->Cell(20,10,"Date:",0,0,'C');
        $pdf->Cell(30,10,date("j-n-Y"),0,1,'C');
        // table column
        $pdf->Cell(10,10,'No',1,0,'C');
        $pdf->Cell(10,10,'id',1,0,'C');
        $pdf->Cell(70,10,'email',1,0,'C');
        $pdf->Cell(30,10,'occupation',1,0,'C');
        $pdf->Cell(20,10,'name',1,0,'C');
        $pdf->Cell(20,10,'lastname',1,0,'C');
        $pdf->Cell(20,10,'gender',1,1,'C');
        // table rows
        $pdf->SetFont('Arial','',12);
        $con = new PDO('mysql:host=localhost;dbname=site','root','');
        $query ="SELECT * FROM user";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                         $i=0;
            while($user = $result->fetch())
            {
              $pdf->Cell(10,10,++$i,1,0,'C');
              $pdf->Cell(10,10,$user['idUser'],1,0,'C');
              $pdf->Cell(70,10,$user['email'],1,0,'C');
              $pdf->Cell(30,10,$user['occupation'],1,0,'C');
               $pdf->Cell(20,10,$user['name'],1,0,'C');
                $pdf->Cell(20,10,$user['lastname'],1,0,'C');
                $pdf->Cell(20,10,$user['gender'],1,1,'C');
            }

        }

        $pdf->Output();
           
 
?>