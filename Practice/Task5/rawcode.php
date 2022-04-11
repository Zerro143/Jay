<?php
$array3D = array(
    array(
        array(1, 0, 9),
        array(0, 5, 6),
        array(1, 0, 3)
    ),
    array(
        array(0, 4, 6),
        array(0, 0, 1),
        array(1, 2, 7)
    ),
);
 
foreach ($array3D as $array2D) {
    foreach ($array2D as $array1D) {
        foreach ($array1D as $element) {
            echo $element;
            echo " ";
        }
        echo "<br>";
    }
    echo "<br>";
}
?>