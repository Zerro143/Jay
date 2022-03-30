<?php
echo "<h1> Strings</h1>";

echo "<br>";
$str ="Hello World";
echo "Orginal string is $str";
echo "<br>";
echo "Length of a string is ".strlen($str);
echo "<br>";
echo "String has ".str_word_count($str)." Words";
echo "<br>";
echo "Reverse of the orignal string: ".strrev($str);
echo "<br>";
echo "Position of the World in orginal String is ".strpos($str,"World");
echo "<br>";
echo "I replaced World with Everone from the given string and the new string is ".str_replace("World","Everyone",$str);
echo "<br>";
echo "String converted to lowercase ".strtolower($str);
echo "<br>";
echo "String converted to uppercase ".strtoupper($str);
echo "<br>";




?>