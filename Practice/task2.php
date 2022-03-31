<?php
#Task 2 Print table of 1 to 10 using loop
include 'need.php';


for ($a = 1; $a < 11; $a++){

    for ($b=1; $b<$a+1;$b++){
        $x = $a * $b; 
        echo "$a X $b = $x" ;
          space();
    
    }
  
}
?>