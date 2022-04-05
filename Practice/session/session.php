<?php
// Start the session
session_start();
?>

<html>
<body>

<?php
// Set session variables
$_SESSION["username"] = "Jay";
$_SESSION["favanimal"] = "Dog";
echo "Session variables are set.";
?>

</body>
</html>