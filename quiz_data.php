<?php
include('includes/header.php');
include('includes/menumptfs.php');
include('includes/connection.inc.php');
// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

if(isset($_POST['submit']))
{
    $quiz = $_POST['quiz'];

 if($quiz == '')
 {
  header('location: generate_pdf.php');
 }
 else{
  
    $sql = "SELECT * FROM `$quiz`";
    $result = mysqli_query($conn, $sql);

    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>#<th>";
    echo "<th>Email<th>";
    echo "<th>name<th>";
    echo "<th>score<th>";
    echo "<th>mobile<th>";
    echo "<th>Result<th>";
    echo "<th>Action<th>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result))
    {  
    // $row = mysqli_fetch_assoc($result);
    $id = $row['c_id'];
    $email = $row['c_email'];
    $score = $row['c_score'];
    $name = $row['c_name']; 
    $mobile = $row['c_mobile'];  
    $c_result = $row['c_result'];
    echo "<tr>";
    echo "<td>$id<td>";
    echo "<td>$email<td>";
    echo "<td>$score<td>";
    echo "<td>$name<td>";
    echo "<td>$mobile<td>";
    echo "<td>$c_result<td>";
    echo "<td>
    <form action='generate_certificate.php' method='post' target='_blank'>
        <input type='hidden' name='c_download' value='$id'>
        <input type='hidden' name='c_quiz' value='$quiz'>
        <input class='btn btn-danger mybtn reloadButton' type='submit' value='Generate Certificate'>
    </form>     
    <td>";    
    echo "</tr>";

}
echo "</table>";
 }

 
}

?>
<?php
include('includes/footer.php');
?>
