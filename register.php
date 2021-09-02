<?php
require_once 'header.php';
require_once 'footer.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login system</title>
</head>
<body>

<center>

<h3>Register page</h3>
<a href="login.php">You have an account? login.</a>
<br>
</br>
<form action="includes/register-inc.php" method="post">
	<input type="text" name="username" placeholder="Username">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<input type="password" name="confirmPassword" placeholder="Repeat Password">
	<button type="submit" name="submit">Register</button>



</form>
</center>

</body>
</html>