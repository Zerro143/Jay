<?php
echo "Printing Fabioanic series <br>";

$num = 10;$n1 = 0; $n2 = 1;
echo "<table>";

for($i=0; $i<$num; $i++){
    echo "<tr><td>".$n1."</td></tr>";
    $nth = $n1 + $n2;
    $n1 = $n2;
    $n2 = $nth;
}
echo "</table>";
?>