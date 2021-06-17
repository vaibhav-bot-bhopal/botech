<?php
include ("includes/connection.inc.php");
if(isset($_POST['c_download']))
{
   $id = $_POST['c_download'];
   $c_quiz = $_POST['c_quiz']; 
}
$sql = "SELECT * FROM `$c_quiz` WHERE `c_id`= '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email = $row['c_email'];
$name = $row['c_name'];
$c_result = $row['c_result'];


if($c_quiz=="mptfs_biodiversity_2021") {
   if($c_result==1)
   {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="/home/onelife/public_html/botech/dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">'. $name .'</span> won the <span style="font-weight: 700;">“FIRST PRIZE”</span> in the quiz. MPTFS appreciates the participation and wishes them all
      the best for future endeavours.
      </p>      
      <div>';
   }
  else if($c_result==2)
   {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="/home/onelife/public_html/botech/dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">'. $name .'</span> won the <span style="font-weight: 700;">“SECOND PRIZE”</span> in the quiz. MPTFS appreciates the participation and wishes them all the
      best for future endeavours.
      </p>      
      <div>';
   }
   else if($c_result==3)
   {
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="/home/onelife/public_html/botech/dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife Conservation. Mr./Ms. <span style="font-weight: 700;">'. $name .'</span> won the <span style="font-weight: 700;">“THIRD PRIZE”</span> in the quiz. MPTFS appreciates the participation and wishes them all
      the best for future endeavours.</p>      
      <div>';
   }
   else{
      $data = '
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="/home/onelife/public_html/botech/dompdf/'. $c_quiz.'.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;">'. $name .'</span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz 2021"</span> organized by MP Tiger Foundation Society in May 2021 to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and
      wishes them all the best for future endeavours.</p>      
      <div>';
   }

}

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

file_put_contents('/home/onelife/public_html/botech/dompdf/pdf/'.$email.'.pdf', $dompdf->output());
echo "<script>window.close();</script>";

?>