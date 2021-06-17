<?php
      $data = '<div class="content_area">
      			<img src="/home/onelife/public_html/botech/dompdf/mptfs_biodiversity_2021.jpg" alt="" width="100%" height="780px">
			<h2>This is Running 12345.</h2>
      		</div>';

// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load content from html file 
// $html = file_get_contents("work.php"); 
$dompdf->loadHtml($data); 

// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
// $dompdf->setPaper('A4'); 
 
// Render the HTML as PDF 
$dompdf->render(); 

file_put_contents('botech'.$email.'.pdf', $dompdf->output());
echo "<script>window.close();</script>";

?>