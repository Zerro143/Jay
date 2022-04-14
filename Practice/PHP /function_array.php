<?php
include 'need.php';
function aba($a,$b)
{
    if($a==$b)
    {
        return 0;
    }
    return ($a>$b)?1:-1;
}

function abc($a,$b)
{
    if($a==$b)
    {
        return 0;
    }
    return ($a>$b)?1:-1;
}

$a1=array("a"=>"Alpha","b"=>"Beta","c"=>"Gamma");
$a2=array("1"=>"Alpha","b"=>"Beta","c"=>"green");
echo "<pre>";
ln();

//"use to check and print diffrent value present in an array <br>";
$result=array_udiff($a1,$a2,"aba");
print_r($result);
space();
ln();

//use to check and print diffrent value and key present in an array
$result=array_udiff_assoc($a1,$a2,"aba");
print_r($result);
space();
ln();

//use to check and print diffrent value and key present in an array using two functions
$result=array_udiff_uassoc($a1,$a2,"aba","abc");
print_r($result);
space();
ln();

//use to check and print same value present in an array
$result=array_uintersect($a1,$a2,"aba");
print_r($result);
space();
ln();

//use to check and print same value and same key in an array
$result=array_uintersect_assoc($a1,$a2,"aba");
print_r($result);
space();
ln();

$a=array("a"=>"red","b"=>"green","c"=>"red");
print_r(array_unique($a));
space();
ln();

array_unshift($a1,"gray");
print_r($a1);
space();
ln();

print_r(array_values($a));
space();
ln();

# The array_walk() function runs each array element in a user-defined function. The array's keys and values are parameters in the function.
function a($x,$y){
    echo "The Key $y has the value $x <br>";
    
}
array_walk($a,"a");
ln();

#The array_walk_recursive() function runs each array element in a user-defined function. The array's keys and values are parameters in the function. The difference between this function and the array_walk() function is that with this function you can work with deeper arrays (an array inside an array).

$a2=array($a1,"1"=>"blue","2"=>"yellow");
array_walk_recursive($a2,"a");
ln();

## Using arsort to print the array in decending order
arsort($a);
print_r($a);
ln();

# Using asort to print the array in acending order
asort($a);
print_r($a);
ln();


$fname = "Jay";
$lname = "Baviskar";
$age = "23";

$r = compact("fname", "lname", "age");
print_r($r);
ln();

echo "Normal count: " . count($a2)."<br>";
echo "Recursive count: " . count($a2,1);
ln();   

echo current($a1) . "<br>";
echo Next($a1);
echo Next($a1).space();
echo prev($a1).space();
echo current($a1).space();
echo end($a1).space();
echo reset($a1).space();
ln();
print_r(each($a1));
ln();

extract($a1);

echo $a,$b;
ln();

if (in_array("gray",$a1)){
    echo "Match found";
    ln();
}
else{
    echo "Match nathi yrr";
    ln();
}

krsort($a1);
print_r($a1);
ln();

ksort($a1);
print_r($a1);
ln();
$pets = array("Dog","Cat","Horse");
list($a, $b, $c) = $pets;
echo "I have several animals, a $a, a $b and a $c.";
ln();

$temp_files = array("temp15.txt","Temp10.txt",
"temp1.txt","Temp22.txt","temp2.txt");

natsort($temp_files);
echo "Natural order: ";
print_r($temp_files);
echo "<br />";

natcasesort($temp_files);
echo "Natural order case insensitve: ";
print_r($temp_files);

ln();

$temp_files = array("temp15.txt","temp10.txt",
"temp1.txt","temp22.txt","temp2.txt");

sort($temp_files);
echo "Standard sorting: ";
print_r($temp_files);
echo "<br>";

natsort($temp_files);
echo "Natural order: ";
print_r($temp_files);

ln();

shuffle($a1);
print_r($a1);
ln();

$temp_files = array("temp15.txt","temp10.txt",
"temp1.txt","temp22.txt","temp2.txt");


?>
