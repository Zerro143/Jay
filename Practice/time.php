<?php
$d1=strtotime("Next Saturday");
$d2=ceil(($d1-time())/60/60/24);
echo "<h1>" . $d2 ." Days</h1>";
?>