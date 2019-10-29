<?php

$conn = new mysqli("localhost","root","", "resumeapp");

$email = $_COOKIE['user'];

$query = "SELECT * FROM personal WHERE email= '$email'";
$result= $conn->query($query);

$query = "SELECT * FROM education WHERE email= '$email'";
$result1=$conn->query($query);

$query = "SELECT * FROM projects WHERE email= '$email'";
$result2=$conn->query($query);

$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
$result1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
$result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);




$content = '
<table style="width: 100%;">
	<tbody>
		<tr>
			<td>
				<h1 style="margin-bottom: 0px;">NAME</h1>
				<p style="margin-top: 4px">DESCRIPTION</p>
			</td>
			<td style="text-align: right">
				<p>EMAIL</p>
				<p>CONTACT</p>
			</td>
		</tr>
	</tbody>
</table>
<br/>
<hr />';
$content = str_replace("NAME", $result['fname'].' '.$result['lname'], $content);
$content = str_replace("DESCRIPTION", $result['description'], $content);
$content = str_replace("EMAIL", $result['email'], $content);
$content = str_replace("CONTACT", $result['contact'], $content);


$content .= '<h2 style="color:blue">Education</h2>';

foreach($result1 as $ey => $value){
    $content.= '<h3>'.$value['institution'].'</h3><p>'.$value['description'].'</p><br/>';
}

$content.='<br/><h2 style="color:blue">Project</h2><br>';
foreach($result2 as $ey => $value){
    $content.= '<h3>'.$value['title'].'</h3><p>'.$value['description'].'</p><br/>';
}


require_once('./tcpdf/tcpdf.php');  
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->SetFont('helvetica', '', 12);  
$obj_pdf->AddPage();  
$obj_pdf->writeHTML($content);  
$obj_pdf->Output('sample.pdf', 'I');  

?>