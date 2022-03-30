<?php

echo "<h1> Numbers </h1>";
$x = 5985;
print "Here we will check the number is $x or not Integer: ";
var_dump(is_int($x));
echo"<br>";

$x = 59.85;
print "Here we will check the number is $x is or not Integer: ";
var_dump(is_int($x));
echo"<br>";

$x = 10.365;
print "Here we will check the number is $x is or not Float: ";
echo "".is_float($x);
echo"<br>";

$x = 1.9e411;
print "Here the given Value of x is Finite or infinite: $x  ";
echo"<br>";

$x = acos(8);
print "Here the given value of x is or not a number: $x  ";
echo"<br>";

$x = 5985;
print "Here we will check the Value is $x is or not numeric: ";
var_dump(is_numeric($x));
echo"<br>";

$x = "5985";
print "Here we will check the value is $x is or not numeric: ";
var_dump(is_numeric($x));
echo"<br>";

$x = "59.85" + 100;
print "Here we will check the value is $x is or not numeric: ";
var_dump(is_numeric($x));
echo"<br>";

$x = "Hello";
print "Here we will check the value is $x is or not numeric: ";
var_dump(is_numeric($x));
echo"<br>";

// Cast float to int
$x = 23465.768;
echo "Here the given value of x is $x which is Float";
echo"<br>";
echo "Here is the value of x after casting it to interger: ".(int)$x;

echo "<br>";

// Cast string to int
$x = "23465.768";
echo "Here the given value of x is $x which is string";

echo "Here is the value of x after casting it to interger: ".(int)$x;

echo "<br>";

echo "Here is the value of ".(int)$x." after casting it to Float: ".(float)$x;

?> 