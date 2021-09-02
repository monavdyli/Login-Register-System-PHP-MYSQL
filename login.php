<?php 
require 'includes/database.php';
session_start();
if (isset($_SESSION['sessionId'])) {
	// code...
	header("location: index.php");
}
else {
	echo "Home";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login system</title>
</head>
<body>

<center>

<h3>Login page</h3>
<a href="register.php">You dont have an account? register.</a>
<br>
</br>
<form action="includes/login-inc.php" method="post">
	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="Password">
	<button type="submit" name="submit">Login</button>



</form>
</center>

</body>
</html>