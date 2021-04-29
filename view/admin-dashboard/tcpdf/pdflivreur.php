<?php  



function fetch_data()  
{  
$output = '';  
$conn = mysqli_connect("localhost", "root", "", "utique_fruit");  
$sql = "SELECT * FROM livreur ORDER BY cin ASC";  
$result = mysqli_query($conn, $sql);  
while($row = mysqli_fetch_array($result))  
{       
$output .= '<tr>  
<td align="center">'.$row["cin"].'</td>  
<td align="center">'.$row["nom"].'</td>  
<td align="center">'.$row["prenom"].'</td>  
<td align="center">'.$row["secteur"].'</td>  
<td align="center">'.$row["mail"].'</td>  
</tr>  
';  
}  
return $output;  
}  
if(isset($_POST["generate_pdf"]))  
{  
include ('library/tcpdf.php'); 
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->SetFont('helvetica', '', 11);  
$obj_pdf->AddPage();  
$content = '';  
$content .= '
<h4 align="center"><b>LA LISTE DES LIVREURS </b> </h4><br /> 

<table border="1" cellspacing="0" cellpadding="3">  
<tr>  
<th width="20%" align="center">CIN</th>  
<th width="20%" align="center">NOM</th>  
<th width="20%" align="center">PRENOM</th>  
<th width="20%" align="center">SECTEUR</th>  
<th width="20%" align="center">MAIL</th>  
</tr>
';  
$content .= fetch_data();  
$content .= '</table>';  
$obj_pdf->writeHTML($content);  
$obj_pdf->Output('file.pdf', 'I');  
}  
?>  
<!DOCTYPE html>  
<html>  
<head>  
<a href="http://localhost/projetweb_livr/views"> <-- Revenir à la première page </a></br>
<a href="http://localhost/projetweb_livr/views/afficherlivreur.php"> <-- Revenir à la page précédente </a></br>
<meta charset="utf-8">	
<title>SoftAOX | Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
</head>  
<body>  
<br />
<div class="container">  
<h4 align="center"> <b>LA LISTE DES LIVREURS</b></h4><br />  
<div class="table-responsive">  
<div class="col-md-12" align="right">
<form method="post">  
<input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
</form>  
</div>
<br/>
<br/>
<table class="table table-bordered">  
<tr>  
<th width="20%" align="center">CIN</th>  
<th width="20%" align="center">NOM</th>  
<th width="20%" align="center">PRENOM</th>  
<th width="20%" align="center">SECTEUR</th>
<th width="20%" align="center">MAIL</th>   
</tr>  
<?php  
echo fetch_data();  
?>  
</table>  
</div>  
</div>  
</body>  
</html>