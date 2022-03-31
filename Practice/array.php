<?php
include 'need.php';
$a="alphbet";$b="Google";$c="Gmail";


$alhp = array($a, $b, $c);
$arrlength = count($alhp);

for($x = 0; $x < $arrlength; $x++) {
  echo $alhp[$x];
  space();
}

$age = array("a"=>$a, "b"=>$b, "c"=>$c);


foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  space();
}

$cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
  );
      
  for ($row = 0; $row < 4; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
      echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
  }
?>