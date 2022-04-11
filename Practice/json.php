<?php
include 'need.php';
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

$a = json_encode($age);
echo"<h3>Encoding the given data as a json</h3>";
echo ($a);
space();
ln();
$b = json_decode($a);
echo"<h3>Decoding the above json data as object</h3>";
print_r($b);
space();

echo $b->Peter;
ln();


$b = json_decode($a,true);
echo"<h3>Decoding the above json data as associative array</h3>";
print_r($b);
space();
echo $b["Peter"];
ln();



?>