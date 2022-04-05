<?php
function cb($item) {
  return strlen($item);
}
echo "<pre>";
$phones = ["Apple", "Samsung", "One Plus", "Nokia"];
$lengths = array_map("cb", $phones);
print_r($lengths);

$lengths = array_map( function($item) { return strlen($item); } , $phones);
print_r($lengths)
?>