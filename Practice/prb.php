<?php

#The array_multisort() function returns a sorted array. You can assign one or more arrays. The function sorts the first array, and the other arrays follow, then, if two or more values are the same, it sorts the next array, and so on.

#Note: String keys will be maintained, but numeric keys will be re-indexed, starting at 0 and increase by 1.

#Note: You can assign the sortorder and the sorttype parameters after each array. If not specified, each array parameter uses the default values.
#as per defination it should sort the array alphabetically but this doesn't sort it that way even if i put sort type 

$a1=array("Dog","Dog","Cat");
$a2=array("Aluto","Fido","Missy");
array_multisort($a1,$a2,SORT_ASC );
print_r($a1);
print_r($a2);
?>