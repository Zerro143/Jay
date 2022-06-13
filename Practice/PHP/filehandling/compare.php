<?php 
include '../need.php';
$csv = fopen("output.csv","r");









echo "<table>";
while (($getData = fgetcsv($csv, 10000, ",")) !== FALSE){
    $fname = $getData[0];
    $lname = $getData[1];
    $email = $getData[2];
    $m = $getData[3];
    $course = $getData[4];
    $bdate = $getData[5];
    $cdate = $getData[6];
    $udate = $getData[7];

    echo "<tr><td>".$fname."</td>";
    echo "<td>".$lname."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$m."</td>";
    echo "<td>".$course."</td>";
    echo "<td>".$bdate."</td>";
    echo "<td>".$cdate."</td>";
    echo "<td>".$udate."</td></tr>";
   
}
echo "</table>";

fclose($csv);
?>