<?php
$x = 1;
$a=1;
$b=1;

//This code will be executed till value of $x reach 20
while($x <= 20) {
  
  while($a+$b <=40){
    echo "The number is: $x and ";
    echo "The value of a and b is $a <br>";
    $a++;
    $b++;
    $x++;
  }
}
$x = 1;
$a=1;
$b=1;

echo "<br>";
do{
    
    while($a+$b <=20){
        echo "The number is: $x and <br> ";
        echo "The value of a and b is $a <br>";
        $a++;
        $b++;
        
    
    }
print$x;
    $x++;
}
while($x <= 20);
  
   
?>
<br>

<?php
	
for ($i=1; $i<=5; $i++)	
{	 
for ($k=5; $k>$i; $k--)	 
    {	  
     echo "&nbsp";	  
    }
for($j=1;$j<=$i;$j++)	  

{	  	
echo "*";	 
}	  	
echo "<br/>";   	
}  
?>
<?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}

$age = array("Jay"=>"23", " "=>"","Ritesh"=>"23");

foreach($age as $x => $val) {
  echo "$x = $val<br>";
}
?>
<?php
for ($x = 0; $x < 10; $x++) {
  if ($x % 2 == 0) {
    continue;
  }
  echo "The number is: $x <br>";
}
?>
