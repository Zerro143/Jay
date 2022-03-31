<?php



define("m", [
  "1"=>"Suprabhat, aapke ane pr khushi ka mahool cha gaya", 
  "2"=>"Suprabhat Tame aya amne khub aanad ayo ",
  "3"=>"Good morning, It our Pleasure to have u here"
]);

$n = array(
"1" =>"Good Afternoon",
"2" =>"Umid hai apka din subh ho",
"3" =>"Asha che k tamra divas saro reh"
);


$x=rand(1,3);


$a= date("H");

if ($a<12) {
    echo "its $a AM so I will  wish you ".m[$x];
  } elseif ($a<16) {
    echo "Its $a PM so I will wish you ".$n[$x];
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

