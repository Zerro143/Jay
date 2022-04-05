<?php
session_start();
?>

<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Username is " . $_SESSION["username"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>