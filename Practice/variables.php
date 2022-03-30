<?php
echo "<h1> variables</h1>";


//see here i created a varible a to store a data "Hello Everyone"
$a ="Hello Everyone";
echo "$a<p>";#here i called he variable a 

echo $a;#here is other way to call the variable 

$a = 1;# i overide the variable a and store 1 in a 
$b = 2;# we can also asign a number 

# here we will perform some arthmatic operation

echo "<p>value of a = $a and value of b = $b we will perform arthmatic operations on them<p>";

echo $a + $b;
echo"<br>";
echo $a - $b;
echo"<br>";
echo $a * $b;
echo"<br>";
echo $a / $b;
echo"<br>";
echo $a | $b;



echo"<p> <b>Now we will declare the variable outside the function</b>";
$x = 5; // global scope
 
function myTest() {
  // using x inside this function will generate an error
  echo "<p>Variable x inside function is: $x</p>";
} 
myTest();

echo "<p>Variable x outside function is: $x</p>";

echo"<p> <b>Now we will declare the variable inside the function</b>";

function myTest2() {
    $x = 10; // local scope
    echo "<p>Variable x inside function is: $x</p>";
  }
  myTest2();
  
  // using x outside the function will generate an error
  echo "<p>Variable x outside function is: $x</p>";

  echo"<p> <b>Now we using global keyword</b>";

$x = 5;
$y = 10;
echo" <p><b>Here we declared x:$x and y:$y and below we created a function to add the value of x & y which is :</b>";
function myTest3() {
  global $x, $y;
  $y = $x + $y;
}

myTest3();
echo "\t$y"; // outputs 15

echo" <p><b>Here we used previously declared x:$x and y:$y and below we created a function to subtract the value of x & y using globlas key word which is :</b>";
function myTest4() {
    $GLOBALS['y'] = $GLOBALS['x'] - $GLOBALS['y'];
  }
  
  myTest4();
  echo $y; // outputs 15

echo"<p> below is the function using static keyword so each time the function is called, that variable will still have the information it contained from the last time the function was called.<br>";
  function myTest5() {
    static $x = 0;
    echo $x;
    $x++;
  }
  
  myTest5();
  echo "<br>";
  myTest5();
  echo "<br>";
  myTest5();
  
  print " <p><b> Uptil now we have seen Usage of variable to store integers(Number) and strings(Letters) Now in below example we will use and array which and var dump to show the type of varilable <br></b>";
  $cars = array("Volvo","BMW","Toyota");
  
  var_dump($cars);
  echo "<br>";

  class bike {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My Bike is a " . $this->color . " " . $this->model . "!";
    }
  }
  
  $myCar = new bike("Black", "Pulsar");
  echo $myCar -> message();
  echo "<br>";
  $myCar = new bike("Red", "Apache");
  echo $myCar -> message();
  

?>