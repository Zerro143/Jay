<?php
$cookie_name = "user";
$cookie_value="Jay Baviskar";

setcookie($cookie_name,$cookie_value,time() + 300,"/");
?>

<?php
include '../need.php';
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];

}
space();
?>
<?php
if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
?>

