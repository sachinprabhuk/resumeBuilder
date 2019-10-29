<?php

$conn = new mysqli("localhost","root","", "resumeapp");

$email = $_COOKIE['user'];
$type = $_GET['type'];

$query = "SELECT * FROM personal WHERE email= '$email'";
$result= $conn->query($query);

$query = "SELECT * FROM education WHERE email= '$email'";
$result1=$conn->query($query);

$query = "SELECT * FROM projects WHERE email= '$email'";
$result2=$conn->query($query);

$query = "SELECT * FROM achivement WHERE email= '$email'";
$result3=$conn->query($query);

$query = "SELECT * FROM experience WHERE email= '$email'";
$result4=$conn->query($query);

$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
$result1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
$result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
$result3 = mysqli_fetch_all($result3,MYSQLI_ASSOC);
$result4 = mysqli_fetch_all($result4,MYSQLI_ASSOC);

$content ='';

if($type=='type1' || $type=='1' ){
	$content .= '
		<table style="width: 100%;">
		<tbody>
			<tr>
				<td>
					<h1 style="margin-bottom: 0px;">'.$result['fname'].' '.$result['lname'].'</h1>
					<p style="margin-top: 4px">'.$result['description'].'</p>
				</td>
				<td style="text-align: right">
					<p>'.$result['email'].'</p>
					<p>'.$result['contact'].'</p>
				</td>
			</tr>
		</tbody>
		</table>
		<br/>
		<hr>
		
		<table style="width: 100%;">
		<tbody>
			<tr>	
				<td><br/>
					<h2 style="color:blue">Experience</h2>';
	
	foreach($result4 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['title'].'</h4>
						<p>'.$value['description'].'</p>
					</div>';
	}					
	$content.='
				</td>
				<td><br/>
					<h2 style="color:blue">Projects</h2>';

	foreach($result2 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['title'].'</h4>
						<p>'.$value['description'].'</p>
					</div>';
	}
	$content.='
				</td>
			</tr>
			<tr>
				<td>
					<h2 style="color:blue">Education</h2>';

	foreach($result1 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['institution'].'</h4>
						<p>'.$value['s_date'].' - '.$value['e_date'].'</p>
						<p>'.$value['description'].'</p>
					</div>';
	}					
	$content.='				
				</td>
				<td>
					<h2 style="color:blue">Achievments</h2>';

	foreach($result3 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['title'].'</h4>
						<p>'.$value['description'].'</p>
					</div>';
	}	

	$content.='				
				</td>
			</tr>
		</tbody>
	</table>
';
	
}
else{

	$content.='
	<table style="width: 100%;">
	<tbody>
		<tr>
			<td>
				<h1 style="margin-bottom: 0px;">'.$result["fname"]." ".$result["lname"].'</h1>
				<p style="margin-top: 4px">'.$result["description"].'</p>
				<br/>
			</td>
			<td style="text-align: right">
				<p>'.$result["email"].'</p>
				<p>'.$result["contact"].'</p>
			</td>
		</tr>
	</tbody>
	</table>
	
	<hr />
	
	<h2 style="color:blue">Experience</h2>';
	foreach($result4 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['title'].'</h4>
						<p>'.$value['description'].'</p>
					</div>';
	}	
	
	$content.='
	<hr />
	<h2 style="color:blue">Projects</h2>';
	foreach($result2 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['title'].'</h4>
						<p>'.$value['description'].'</p>
					</div>';
	}

	$content.='
	<hr />
	<h2 style="color:blue">Education</h2>';

	foreach($result1 as $ey => $value){
		$content.= '<table style="width: 100%;">
						<tbody>
							<tr>
								<td>
									<h4>'.$value['institution'].'</h4>
									<p>'.$value['description'].'</p>
									<br/>
								</td>
								<td style="text-align: right">
									<p>'.$value['s_date'].' - '.$value['e_date'].'</p>
								</td>
							</tr>
						</tbody>		
					</table>';
	}
	$content.='
		<hr />
		<br/>
		<h2 style="color:blue">Achievments</h2>';
	foreach($result3 as $ey => $value){
		$content.= '<div>
						<h4>'.$value['title'].'</h4>
						<p>'.$value['description'].'</p>
					</div>';
	}	
		
	
	

}
require_once('./tcpdf/tcpdf.php');  
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("RESUME BUILDER: ".$result['fname']."'s resume");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '20', PDF_MARGIN_RIGHT, TRUE);  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->AddPage();  
$obj_pdf->writeHTML($content);
$data = $result['fname'].".pdf";
$obj_pdf->Output($data, 'I');  

?>