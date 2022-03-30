<?php
echo "<h1> Maths</h1>";

echo "pi() will print the value of ".pi();
echo "<br>";

$a = 10.5; $b = -12; $c = 4;
echo"min() will print the min value from ($a,$b,$c): ".min($a,$b,$c);  
echo "<br>";
echo"max() will print the max value from ($a,$b,$c): ".max($a,$b,$c);  
echo "<br>";
echo"abs($b) will print the absolute positive of given value: ".abs($b);  
echo "<br>";
echo"sqrt($c) will print the square root of the given value: ".sqrt($c);  
echo "<br>";
echo"round($a) will print the nearest interger of the given value: ".round($a); 
echo "<br>"; 
echo"rand() will print the random number: ".rand(); 
echo "<br>"; 
echo"rand($c,$a) will print the random number between $c and $a: ".rand($c,$a); 
echo "<br>"; 
echo"base_convert($c,10,2) will convert the base of the given value from decimal to binary: ".base_convert($c,10,2);
echo "<br>"; 
echo"decbin($c) will convert the base of the given value from decimal to binary: ".decbin($c);


?>  