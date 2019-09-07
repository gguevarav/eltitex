<?php 
include ('fpdf.php');
//$pdf->Output("test.pdf",F);
$mipdf='flujos/flujonuevo.pdf';
header('Content-Type: application/pdf');
//header('Content-Disposition: inline; filename="'.$mipdf.'"');
header('filename="'. basename($mipdf).'"');
readfile($mipdf);
?>