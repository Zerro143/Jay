<?php
#Task 1 make a loop which runs till 100 and  store odd number in $odd array and Even number in $even array 
include 'need.php';
$odd = array();
$even= array();
for ($a = 0; $a < 100; $a++) {

    if ($a & 1) {
        $odd[]=$a;
      continue;
    }
    $even[]=$a;
}  

 /*for ($b = 0; $b < 100; $b++) {
    if ($b % 2 != 0) {
      continue;
    }
    $even[]=$b;
}*/
echo count($odd)."<br>";
echo count($even);
space();
$arrlength = count($odd);

/*for($x = 0; $x < $arrlength; $x++) {
    echo "This is Odd Number ".$odd[$x];
    echo " This is Even Number ".$even[$x];
    space();
}*/
echo "<pre>";
print_r($odd);
print_r($even);

?>