<?php
function divide($dividend, $divisor) {
  if($divisor == 0) {
    throw new Exception("Division by zero");
  }
  return $dividend / $divisor;
}

try {
  echo divide(5, 0)."<br>";
} 
catch(Exception $e) {
    echo "Unable to divide <br>";
}
finally {
  echo "Process complete.";
}