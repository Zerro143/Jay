<?php
$a= date("H");

if ($a<12) {
    echo "its $a AM so I will  wish you Good Morning";
  } elseif ($a<16) {
    echo "Its $a PM so I will wish you Good Afternoon";
  }
    elseif($a<21){
        echo "Its $a PM so I will wish you Good Evening";
    } 
  else {
    "Its $a PM so I will wish you Good Night";
  }
echo "<br>";

?>


<?php
$favcolor = "Black";

switch ($favcolor) {
  case "Red":
    echo "Red good selection";
    break;
  case "Black":
    echo "Yo Homie you and me have a same selection";
    break;
  case "blue":
    echo "Blue suits on me though";
    break;
  default:
    echo "Your color selection is Tatti";
}
?>