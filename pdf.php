<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM claims");
//$user=$db_handle->runQuery("SELECT * FROM user WHERE userid=")


require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage(); //adding a page i.e overriding thefpdf class in fpdf.php  
$pdf->SetFont('Arial','B',12);	

foreach ($result as $x ) {

	$display=$x['claim_name'];
	$pdf->Cell(56, 6, $display , 0, 'L', FALSE);


}
$pdf->Ln();

foreach ($result as $x ) {

	$display=$x['claim_id'];
	$pdf->Cell(56, 6, $display , 0, 'L', FALSE);
}

$pdf->Ln();
foreach ($result as $x ) {

	$display=$x['claim_email'];
	$pdf->Cell(56, 6, $display , 0, 'L', FALSE);
}



$pdf->Output();
?>