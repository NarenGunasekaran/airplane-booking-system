<?php 
require_once('tcpdf/tcpdf.php');
ob_start();
session_start();
include('includes/db_config.php');

if(isset($_REQUEST['id'])!=''){
$id=$_REQUEST['id'];	
}
	$query=mysql_query("select * from book where id='$id'");
$row=mysql_fetch_assoc($query);
	 class MYPDF extends TCPDF {

    //Page header
   
    // Page footer
    public function Footer() {
        // Position at 25 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 10);
        $this->SetTextColor(150);
       
       
        
        // Page number
      
    }
    
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
/*$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);*/
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetPrintHeader(false);
$pdf->SetMargins(25, 40, 25, true);
$pdf->setCellHeightRatio(1.6);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', '',9);
$pdf->AddPage();

$total='';$total=$row['price']*$row['passenger'];
$html = '<html>
<head>
<style>
.capitalize {
        text-transform: capitalize;
    }
</style>
</head>
<body>
<div>
<table>
<tr><th style="font-size:10px;font-weight:bolder">THANK YOU FOR CHOOSING '.strtoupper($row['airline']).' AIRLINES</th></tr>
<tr><th></th></tr>
<tr><th></th></tr>
<tr><th></th></tr>
</table>
<hr/>
<table>
<tr><th></th></tr>
<tr><th></th></tr>
<tr><th width="80"><h4>Airline</h4></th><td width="200">'.$row['airline'].'</td><th width="80"><h4>Arrival</h4></th><td>'.$row['arrival'].'</td></tr>
<tr><th width="80"><h4>Flight No.</h4></th><td>'.$row['flight_no'].'</td><th width="80"><h4>Departure</h4></th><td>'.$row['dep'].'</td></tr>
<tr><th width="80"><h4>Route</h4></th><td>'.$row['from_city']. " - " .$row['to_city'].'</td><th width="80"><h4>Food</h4></th><td>'.$row['food'].'</td></tr>
<tr><th width="80"><h4>Price</h4></th><td>'.$total."rs".'</td><th width="80"><h4>Passenger</h4></th><td>'.$row['passenger'].'</td></tr>
<tr><th></th></tr>
<tr><th></th></tr>
<hr/>

</table></div>


</body>
</html>';
ob_end_clean(); 
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();
if($id!=''){
	
$pdf->Output($row['user'].'_ticket.pdf', 'I');
}
/*$pdf->Image('@' . $img,10,10,30);*/
?>

