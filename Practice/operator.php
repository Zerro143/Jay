<?php
include_once 'constant.php';
echo"<br>";
echo"<h1>Operator</h1> (Arthimatic Operators already done so no Repeat)";
echo"<br>";echo"<br>";
echo "<b>Assignment Operators</b>";
echo"<br>";
echo " x = y \t x = y 	The left operand gets set to the value of the expression on the right";
echo"<br>";

$x = 20; $y = 100;
echo " Here the value of x = $x <br>";
echo "Here the $ x += $y is used which will add $y in the x and give: ".$x += $y; echo "<br>";
echo "Here the $ x -= 40 is used which will subtract 40 in the x and give us: ".$x -=40; echo "<br>";
echo "Here the $ x *= $x is used which will Multiply x which is  $x by $x and give us: ".$x *=$x; echo "<br>";
echo "Here the $ x /= $y is used which will divide x which is $x by $y and give us: ".$x /=$y; echo "<br>";
$y=5;
echo "Here the $ x %= $y is used which will divide x which is $x by $y and give us remider: ".$x %=$y; echo "<br>";



echo " After all the operation the value of x = $x   <br>";

?>

<br>


<?php
echo "<b>Comparison Operators</b>";
echo"<br>";
echo"<br>";
$x = 100;  
$y = "100";
echo "We Compare $x with '100' by using ($ x == $ y) Which is: ";
echo var_dump($x == $y); // returns true because values are equal
echo"<br>returns True because values are equal<br><br>";
echo "We Compare $x with '100' by using ($ x === $ y) Which is: ";
echo var_dump($x === $y); #returns false because types are not equal
echo "<br>returns false because types are not equal<br><br>";
echo "We Compare $x with '100' by using ($ x != $ y) Which is: ";
echo var_dump($x != $y); // returns true because values are equal
echo"<br>returns false because values are equal<br><br>";
echo "We Compare $x with '100' by using ($ x <> $ y) Which is: ";
echo var_dump($x <> $y); // returns true because values are equal
echo"<br>returns false because values are equal<br><br>";
echo "We Compare $x with '100' by using ($ x !== $ y) Which is: ";
echo var_dump($x !== $y); // returns true because values are equal
echo"<br>returns true because types are not equal<br><br>";

$x = 100;
$y = 50;

echo "We Compare $x with $y by using ($ x > $ y) Which is: ";
var_dump($x > $y); // returns true because $x is greater than $y
echo"<br>returns true because x is greater than y <br><br>";

echo "We Compare $x with $y by using ($ x < $ y) Which is: ";
var_dump($x < $y); // returns false because $x is greater than $y
echo"<br>returns false because x is greater than y <br><br>";

echo "We Compare $x with $y by using ($ x >= $ y) Which is: ";
var_dump($x >= $y); // returns true because $x is greater than $y
echo"<br>returns true because x is greater than y <br><br>";

echo "We Compare $x with $y by using ($ x <= $ y) Which is: ";
var_dump($x <= $y); // returns false because $x is greater than $y
echo"<br>returns false because x is greater than y <br><br>";

echo "We Compare $x and $y ($ x <=> $ y) Which Returns: ".($x <=> $y);
echo"<br>returns +1 because x is greater than y <br><br>";

echo "We compare $x and $y using ($ y <=> $ x)Which Returns: ".($x <=> $y);
echo"<br>returns -1 because y is smaller than x <br><br>";

$x=50;

echo "We Compare $x and $y using ($ x <=> $ y)Which Returns: ".($x <=> $y);
echo"<br>returns 0 because values are equal <br><br>";

echo "<b> Increment / Decrement Operators</b><br><br>";
echo " Here the value of x = $x <br>";  
echo " Here the value of x is incresed by 1 using ++$ x which makes the value of x ".++$x."<br>";  
echo " Here the value of x is incresed by 1 using $ x++ which makes the value of x ".$x++." the value isn't incresed<br>";  
echo " Here the value of x = $x because the value incresed after the execution of the statment and this is next statment <br>";  

echo " Here the value of x is decreased by 1 using --$ x which makes the value of x ".--$x."<br>"; 
echo " Here the value of x is decreased by 1 using $ x-- which makes the value of x ".$x--."but the value isn't decreased<br>"; 
echo " Here the value of x = $x because the value decreased after the execution of the statment and this is next statment <br>";  
?>  